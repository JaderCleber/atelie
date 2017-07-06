<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Usuario;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class LoginController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function indexLogin(Request $request)
    {
      try {
      	$form = $this->createFormBuilder( new Usuario (), array (
      			'attr' => array (
      					'class' => 'form-login'
      			)
      	) )->add ( 'tLogin', TextType::class, array (
      			'label_attr' => array (
      					'style' => 'display:none'
      			),
      			'attr' => array (
      					'id'=>"userName",
      					'placeholder'=>"login",
      					'class' => 'form-control input-sm chat-input',
                'style' => 'margin-bottom: 10px'
      			)
      	) )->add ( 'tSenha', PasswordType::class, array (
      			'label_attr' => array (
      					'style' => 'display:none'
      			),
      			'attr' => array (
      					'id'=>"userPassword",
      					'placeholder'=>"senha",
      					'class' => 'form-control input-sm chat-input',
                'style' => 'margin-bottom: 10px'
      			)
        ) )->add ( 'save', SubmitType::class, array (
    				'label' => 'Entrar   ',
    				'attr' => array (
    						'class' => 'btn btn-primary btn-lg',
    						'style' => 'margin-bottom:10px'
    				)
    		) )->getForm ();
        $form->handleRequest ( $request );
        if ($form->isSubmitted () && $form->isValid ()) {
          try {
            $dao = new DaoUsuario ();
      			$dao->setOperacao ( '3' );
      			$dao->setEmail ( $form ['temail']->getData () );
      			$dao->setSenha ( $form ['tsenha']->getData () );
      			$usuario = $dao->exec ( $this->getDoctrine ()->resetManager () );

      			$idUsuario = 0;
      			$notificacao = Notificacao::N01;
      			$route = 'notificacao';
      			if (! is_array ( json_decode ( $usuario, true ) ))
      				$notificacao = $usuario;
      			else {
      				$usuario = json_decode ( $usuario, true );
      				if ($usuario ['tcodativacao'] != "")
      					$notificacao = Notificacao::N02;
      				else {
      					$idUsuario = $usuario ['id'];
      					$route = 'app_principal';
      				}
      			}
      		} catch ( \Exception $e ) {
      			return Notificacao::N00;
      		}

          $notificacao = $response ['parametros'] ['notificacao'];
    			$idUsuario = $response ['parametros'] ['idUsuario'];

    			$_SESSION ['idUsuario'] = $idUsuario;
    			if ($idUsuario == 0)
    				return $this->redirectToRoute ( $response ['route'], [
    						'msn' => $notificacao
    				] );
    			else
    				return $this->redirectToRoute ( $response ['route'] );
    		}
        return $this->render('default/login.html.twig', array('form'=>$form->createView ()));
      } catch (Exception $e) {
        die(var_dump($e));
      }
    }
}
