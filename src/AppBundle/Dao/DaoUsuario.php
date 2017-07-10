<?php

namespace AppBundle\Dao;

use AppBundle\Entity\Funcoes;
use AppBundle\Entity\Usuario;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Notificacao;

class DaoUsuario {
	private $usuario;
	private $operacao;
	private $nome;
	private $email;
	private $senha;
	private $telefone;
	private $id;
	private $codAtivacao;
	private $em;
	private $statusExec;
  private $login;
	public function setOperacao($operacao) {
		// 1 - insert
		// 2 - update
		$this->operacao = $operacao;
		return $this;
	}
	public function setNome($nome) {
		$this->nome = $nome;
		return $this;
	}
	public function setEmail($email) {
		$this->email = $email;
		return $this;
	}

  public function setLogin($login) {
		$this->login = $login;
		return $this;
	}

	public function setSenha($senha) {
		$this->senha = $senha;
		return $this;
	}
	public function setTelefone($telefone) {
		$this->telefone = $telefone;
		return $this;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function setCodAtivacao($codAtivacao) {
		$this->codAtivacao = $codAtivacao;
		return $this;
	}
	public function exec($em) {
		try {
			$this->statusExec = '';
			$this->em = $em;

			switch ($this->operacao) {
				case '1' :
					$this->execNovo ();
					break;
				case '2' :
					$this->execAtualiza ();
					break;
				case '3' :
					$this->execLogin ();
					break;
				case '4' :
					$this->execGetUsuarioId ();
					break;
				case '5' :
					$this->execGetEmailValido ();
					break;
			}
			return $this->statusExec;
		} catch ( \Exception $e ) {
			return $e->getMessage ();
		}
	}
	private function execNovo() {
		try {
			$this->usuario = new Usuario ();
			$this->usuario->setDcadastro ( new \DateTime () );
			$this->usuario->setTcodativacao( $this->codAtivacao );
			$this->usuario->setTemail ( $this->email );
			$this->usuario->setTnome ( $this->nome );
			$this->usuario->setTsenha ( $this->senha );
			$this->usuario->setTtelefone ( $this->telefone );

			$this->em->persist ( $this->usuario );
			$this->em->flush ();

			$this->statusExec = Notificacao::N11;
		} catch ( \Exception $e ) {
			die ( $e->getMessage () . ' ' . $e->getFile () . '/' . $e->getLine () );
			$this->statusExec = Notificacao::N06;
		}
	}
	private function execAtualiza() {
		try {
			$this->usuario = $this->em->createQuery ( 'SELECT u
		    FROM AppBundle:Usuario u
			WHERE u.id = :id' )->setParameter ( 'id', $this->id )->getOneOrNullResult ();

			$this->usuario->setTcodativacao( $this->codAtivacao ? $this->codAtivacao : $this->usuario->getTcodativacao() );
			$this->usuario->setTemail ( $this->email ? $this->email : $this->usuario->getTemail () );
			$this->usuario->setTnome ( $this->nome ? $this->nome : $this->usuario->getTnome () );
			$this->usuario->setTsenha ( $this->senha ? $this->senha : $this->usuario->getTsenha () );
			$this->usuario->setTtelefone ( $this->telefone ? $this->telefone : $this->usuario->getTtelefone () );

			$this->em->flush ();
			$this->statusExec = Notificacao::N12;
		} catch ( \Exception $e ) {
			die ( $e->getMessage () . ' ' . $e->getFile () . '/' . $e->getLine () );
			$this->statusExec = Notificacao::N00;
		}
	}
	private function execLogin() {
		try {
			$this->usuario = $this->em->createQuery ( 'SELECT u
		    FROM AppBundle:Usuario u
			WHERE u.tlogin = :login and u.tsenha = :senha' )
      ->setParameter ( 'login', $this->login )
      ->setParameter ( 'senha', md5 ( $this->senha ) )->getOneOrNullResult ();

			if ($this->usuario) {
				// $this->usuario->setDcadastro ( $this->usuario->getDcadastro ()->format ( 'd-m-Y H:i' ) );
				// $funcoes = new Funcoes ();
				// $funcoes->setPreparaSerializacao ();
				// $jsonContent = $funcoes->getObjetoSerializadoJson ( $this->usuario );
				// $this->statusExec = $jsonContent;
        $this->statusExec = $this->usuario->getId();
			} else
				$this->statusExec = "Não consegui encontrar os dados informados. Poderia tentar novamente, por favor?";
		} catch ( \Exception $e ) {
			die ( $e->getMessage () . ' ' . $e->getFile () . '/' . $e->getLine () );
			$this->statusExec = Notificacao::N00;
		}
	}
	private function execGetUsuarioId() {
		try {
			$this->usuario = $this->em->createQuery ( 'SELECT u
		    FROM AppBundle:Usuario u
			WHERE u.id = :id' )->setParameter ( 'id', $this->id )->getOneOrNullResult ();

			$funcoes = new Funcoes ();
			$funcoes->setPreparaSerializacao ();
			$jsonContent = $funcoes->getObjetoSerializadoJson ( $this->usuario );
			$this->statusExec = $jsonContent;
		} catch ( \Exception $e ) {
			die ( $e->getMessage () . ' ' . $e->getFile () . '/' . $e->getLine () );
			$this->statusExec = Notificacao::N00;
		}
	}
	private function execGetEmailValido() {
		try {
			$response = $this->em->createQuery ( 'SELECT u.temail
    		FROM AppBundle:Usuario u
			WHERE u.temail = :email' )->setParameter ( 'email', $this->email )->getResult ();

			if (! $response)
				$this->statusExec = '';
			else
				$this->statusExec = Notificacao::N03;
		} catch ( \Exception $e ) {
			die ( $e->getMessage () . ' ' . $e->getFile () . '/' . $e->getLine () );
			$this->statusExec = Notificacao::N00;
		}
	}

	private function execCancelaConta(){
		try {
			$this->usuario = $this->em->createQuery ( 'SELECT u
		    FROM AppBundle:Usuario u
			WHERE u.id = :id' )->setParameter ( 'id', $this->id )->getOneOrNullResult ();

			//$this->usuario->seti( $this->telefone ? $this->telefone : $this->usuario->getTtelefone () );

			$this->em->flush ();

			$this->statusExec = 'ok';
		} catch ( \Exception $e ) {
			die ( $e->getMessage () . ' ' . $e->getFile () . '/' . $e->getLine () );
			$this->statusExec = Notificacao::N00;
		}
	}
}
