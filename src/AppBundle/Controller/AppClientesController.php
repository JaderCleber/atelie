<?php
/*
* php bin/console doctrine:schema:update --force
* php bin/console server:run
*
* php bin/console doctrine:mapping:import --force AppBundle xml
* php bin/console doctrine:mapping:convert annotation ./src
* php bin/console doctrine:generate:entities AppBundle
*
* php bin/console cache:clear -env=prod
*
*/
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Clientepf;
use AppBundle\Entity\Clientepj;

class AppClientesController extends Controller
{
  /**
  * @Route("/app/clientes", name="app_clientes")
  */
  public function clientesApp(Request $request)
  {
    return $this->render('default/app-clientes.html.twig', [
      'session' => $_SESSION
    ]);
  }

  /**
  * @Route("/api/cliente/controle", name="api_controle_cliente")
  * @method("POST")
  */

  public function controleCliente(Request $request){
    try {
      $em = $this->getDoctrine()->getManager();

      if ($request->request->get('id') == 0){
        if ($request->request->get('tipo') == 1) {
          $cliente = new ClientePF();
        } else {
          $cliente = new ClientePJ();
        }
      } else {
        if ($request->request->get('tipo') == 1) {
          $cliente = $em->createQuery ( 'SELECT e
            FROM AppBundle:ClientePF e
            WHERE e.id = :id' )
            ->setParameter ( 'id', $request->request->get('id') )->getOneOrNullResult ();
        } else {
          $cliente = $em->createQuery ( 'SELECT e
            FROM AppBundle:ClientePJ e
            WHERE e.id = :id' )
            ->setParameter ( 'id', $request->request->get('id') )->getOneOrNullResult ();
        }

        if (!$cliente)
            die("Não consegui encontrar os dados sobre a cliente. Por favor, utilize a tecla F5");
      }
      $retorno = "<form  action=\"/api/cliente/dao\"  class=\"form-horizontal\" method=\"post\" >
        <div class=\"form-group\">
          <label class=\"control-label col-md-4\"> Código </label>
          <div class=\"controls col-md-2 \">
            <input readOnly name=\"id\" value=\"" . $cliente->getId() . "\" class=\"input-md textinput textInput form-control\" id=\"id\" style=\"margin-bottom: 10px\" type=\"text\" />
          </div>
        </div>
        <div class=\"form-group required\">
          <label class=\"control-label col-md-4  requiredField\">Status<span class=\"asteriskField\">*</span> </label>
          <div class=\"controls col-md-8 \"  style=\"margin-bottom: 10px\">
            <label class=\"radio-inline\">
              <input " . ($cliente->getIdstatus() == 2?"checked":"") . " type=\"radio\" name=\"status\" value=\"2\"  style=\"margin-bottom: 10px\">
              Ativa
            </label>
            <label class=\"radio-inline\">
              <input " . ($cliente->getIdstatus() == 1?"checked":"") . " type=\"radio\" name=\"status\" value=\"1\"  style=\"margin-bottom: 10px\">
              Inativa
            </label>
          </div>
        </div>
        <div class=\"form-group required\">
          <label class=\"control-label col-md-4  requiredField\"> Nome Fantasia<span class=\"asteriskField\">*</span> </label>
          <div class=\"controls col-md-8 \">
            <input name=\"nome-fantasia\" value=\"" . $cliente->getTnomefantasia() . "\" class=\"input-md textinput textInput form-control\" id=\"nome-fantasia\" placeholder=\"O Nome Fantasia da cliente aqui\" style=\"margin-bottom: 10px\" type=\"text\" />
          </div>
        </div>
        <div class=\"form-group required\">
          <label class=\"control-label col-md-4  requiredField\"> Razão Social<span class=\"asteriskField\">*</span> </label>
          <div class=\"controls col-md-8 \">
            <input name=\"razao-social\" value=\"" . $cliente->getTrazaosocial() . "\" class=\"input-md textinput form-control\" id=\"razao-social\" placeholder=\"A Razão Social da cliente aqui\" style=\"margin-bottom: 10px\" type=\"text\" />
          </div>
        </div>
        <div class=\"form-group required\">
          <label class=\"control-label col-md-4  requiredField\"> CNPJ<span class=\"asteriskField\">*</span> </label>
          <div class=\"controls col-md-8 \">
            <input name=\"cnpj\" value=\"" . $cliente->getTcnpj() . "\" class=\"input-md textinput form-control\" id=\"cnpj\" placeholder=\"O CNPJ da cliente aqui\" style=\"margin-bottom: 10px\" type=\"text\" />
          </div>
        </div>
        <div class=\"form-group required\">
          <label class=\"control-label col-md-4  requiredField\"> CPF do Responsável<span class=\"asteriskField\">*</span> </label>
          <div class=\"controls col-md-8 \">
            <input name=\"cpf-responsavel\" value=\"" . $cliente->getTcpfresponsavel() . "\" class=\"input-md textinput form-control\" id=\"cpf\" placeholder=\"O CPF do Responsável da cliente aqui\" style=\"margin-bottom: 10px\" type=\"text\" />
          </div>
        </div>
        <div class=\"form-group required\">
          <label class=\"control-label col-md-4  requiredField\"> Inscrição Municipal<span class=\"asteriskField\">*</span> </label>
          <div class=\"controls col-md-8 \">
            <input name=\"inscricao-municipal\" value=\"" . $cliente->getTinscmunicipal() . "\" class=\"input-md textinput form-control\" id=\"inscricao-municipal\" placeholder=\"A Inscrição Municipal da cliente aqui\" style=\"margin-bottom: 10px\" type=\"text\" />
          </div>
        </div>
        <div class=\"form-group required\">
          <label class=\"control-label col-md-4  requiredField\"> Inscrição Estadual<span class=\"asteriskField\">*</span> </label>
          <div class=\"controls col-md-8 \">
            <input name=\"inscricao-estadual\" value=\"" . $cliente->getTinscestadual() . "\" class=\"input-md textinput form-control\" id=\"inscricao-estadual\" placeholder=\"A Inscrição Estadual da cliente aqui\" style=\"margin-bottom: 10px\" type=\"text\" />
          </div>
        </div>
        <div class=\"form-group\">
          <div class=\"controls col-md-offset-4 col-md-8 \">
            <div id=\"div_id_terms\" class=\"checkbox required\">
              <label for=\"id_terms\" class=\" requiredField\">
              <input class=\"input-ms checkboxinput
              id=\"id_terms\" name=\"concentimento\" style=\"margin-bottom: 10px\" type=\"checkbox\" />
              Concordo que todas as informações acima são inteiramente de minha responsabilidade
              </label>
            </div>
          </div>
        </div>
        <div class=\"form-group\">
          <div class=\"aab controls col-md-4 \"></div>
          <div class=\"controls col-md-8 \">
            <input type=\"submit\" name=\"Signup\" value=\"Salvar\" class=\"btn btn-primary btn-lg btn-info\" />
          </div>
        </div>
      </form>";
      die($retorno);
    } catch (Exception $e) {
      die(var_dump($e));
    }
  }

  /**
  * @Route("/api/empresa/dao", name="api_dao_empresa")
  * @method("POST")
  */

  public function daoCliente(Request $request){
    try {
      $em = $this->getDoctrine()->getManager();

      if ($request->request->get('id') == ""){
        $empresa = new Empresa();
      } else {
        $empresa = $em->createQuery ( 'SELECT e
          FROM AppBundle:Empresa e
          WHERE e.id = :id' )
          ->setParameter ( 'id', $request->request->get('id') )->getOneOrNullResult ();
        if (!$empresa) {
          die("Não consegui encontrar os dados sobre a empresa. Por favor, utilize a tecla F5");
        }
      }

      $empresa->setIdstatus($request->request->get('status'));
      $empresa->setTnomefantasia($request->request->get('nome-fantasia'));
      $empresa->setTrazaosocial($request->request->get('razao-social'));
      $empresa->setTcnpj($request->request->get('cnpj'));
      $empresa->setTcpfresponsavel($request->request->get('cpf-responsavel'));
      $empresa->setTinscmunicipal($request->request->get('inscricao-municipal'));
      $empresa->setTinscestadual($request->request->get('inscricao-estadual'));

      $em->persist($empresa);
      $em->flush();
      return $this->redirectToRoute ( 'app_empresas' );
    } catch (Exception $e) {
      die(var_dump($e));
    }
  }

  /**
  * @Route("/api/clientes/pesquisa", name="api_pesquisar_clientes")
  * @method("POST")
  */

  public function pesquisarClientes(Request $request){
    try {
      $em = $this->getDoctrine()->getManager();

      $tipo = $request->request->get('tipo');
      $cpf = $request->request->get('cpf');
      $cnpj = $request->request->get('cnpj');
      $razao = $request->request->get('razao');
      $cpfresponsavel = $request->request->get('cpfresponsavel');
      $nome = $request->request->get('nome');

      if ($tipo == 1){
        $query = $em->createQuery ( 'SELECT c
          FROM AppBundle:Clientepf c
          WHERE c.tcpf = :cpf or c.tnome like :nome
          ORDER BY c.tnome ASC' )
        ->setParameter('cpf', $cpf)
        ->setParameter('nome', $nome);
        $empresas = $query->getResult ();
      } else {
        $query = $em->createQuery ( 'SELECT c
          FROM AppBundle:Clientepj c
          WHERE c.tcpfresponsavel = :cpf
            or c.trazaosocial like :razao

            or c.cnpj = :cnpj
          ORDER BY c.trazaosocial ASC' )
        ->setParameter('cpf', $cpfresponsavel)
        ->setParameter('razaosocial', $razao)
        ->setParameter('cnpj', $cnpj);
        $empresas = $query->getResult ();
      }

      if(!$empresas)
        die("Nenhum resultado encontrado");

      $retorno = "<div class=\"method\">
        <!-- CAMPOS -->
        <div class=\"row margin-0 list-header hidden-sm hidden-xs\">";
      if ($tipo == 1)
        $retorno .= "<div class=\"col-md-5\"><div class=\"header\">NOME DO CLIENTE</div></div>
        <div class=\"col-md-3\"><div class=\"header\">CPF</div></div>";
      else
        $retorno .= "<div class=\"col-md-4\"><div class=\"header\">RAZÃO SOCIAL</div></div>
          <div class=\"col-md-3\"><div class=\"header\">CNPJ</div></div>
          <div class=\"col-md-3\"><div class=\"header\">NOME FANTASIA</div></div>
          <div class=\"col-md-2\"><div class=\"header\">CPF RESPONSAVEL</div></div> ";

      $retorno .= "</div>
      <!-- REGISTROS -->
      <div class=\"row margin-0\">";

      foreach ($empresas as &$empresa) {
        if ($tipo == 1) {
          $retorno .= "<div class=\"col-md-5\">
              <div class=\"cell\">
                  <div class=\"propertyname\">
                      ".$emprsa->getTnome()."
                  </div>
              </div>
          </div>
          <div class=\"col-md-3\">
              <div class=\"cell\">
                  <div class=\"type\">
                      <code>".$emprsa->getTcpf()."</code>
                  </div>
              </div>
          </div>";
        } else {
          $retorno .= "<div class=\"col-md-4\">
              <div class=\"cell\">
                  <div class=\"propertyname\">
                      ".$emprsa->getTrazaosocial()."
                  </div>
              </div>
          </div>
          <div class=\"col-md-3\">
              <div class=\"cell\">
                  <div class=\"propertyname\">
                      ".$emprsa->getTnomefantasia()."
                  </div>
              </div>
          </div>
          <div class=\"col-md-3\">
              <div class=\"cell\">
                  <div class=\"type\">
                      <code>".$emprsa->getTcnpj()."</code>
                  </div>
              </div>
          </div>
          <div class=\"col-md-2\">
              <div class=\"cell\">
                  <div class=\"type\">
                      <code>".$emprsa->getTcpfresponsavel()."</code>
                  </div>
              </div>
          </div>";
        }

      }

      $retorno .= "</div></div>";
      die($retorno);
    } catch (Exception $e) {
      die(var_dump($e));
    }
  }
}
