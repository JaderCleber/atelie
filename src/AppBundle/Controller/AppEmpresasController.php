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
use AppBundle\Entity\Empresa;

class AppEmpresasController extends Controller
{
  /**
  * @Route("/app/empresas", name="app_empresas")
  */
  public function empresasApp(Request $request)
  {
    $em = $this->getDoctrine()->getManager();
    $query = $em->createQuery ( 'SELECT e
      FROM AppBundle:Empresa e ORDER BY e.trazaosocial ASC' );
    $empresas = $query->getResult ();

    return $this->render('default/app-empresas.html.twig', [
      'session' => $_SESSION,
      'empresas' => $empresas
    ]);
  }

  /**
  * @Route("/api/empresa/controle", name="api_controle_empresa")
  * @method("POST")
  */

  public function controleEmpresa(Request $request){
    try {
      $em = $this->getDoctrine()->getManager();

      if ($request->request->get('id') == 0){
        $empresa = new Empresa();
        $empresa->setIdstatus(2);
      } else {
        $empresa = $em->createQuery ( 'SELECT e
          FROM AppBundle:Empresa e
          WHERE e.id = :id' )
          ->setParameter ( 'id', $request->request->get('id') )->getOneOrNullResult ();
        if (!$empresa) {
          die("Não consegui encontrar os dados sobre a empresa. Por favor, utilize a tecla F5");
        }

      }

      $retorno = "<form  action=\"/api/empresa/dao\"  class=\"form-horizontal\" method=\"post\" >
        <div class=\"form-group\">
          <label class=\"control-label col-md-4\"> Código </label>
          <div class=\"controls col-md-2 \">
            <input readOnly name=\"id\" value=\"" . $empresa->getId() . "\" class=\"input-md textinput textInput form-control\" id=\"id\" style=\"margin-bottom: 10px\" type=\"text\" />
          </div>
        </div>
        <div class=\"form-group required\">
          <label class=\"control-label col-md-4  requiredField\">Status<span class=\"asteriskField\">*</span> </label>
          <div class=\"controls col-md-8 \"  style=\"margin-bottom: 10px\">
            <label class=\"radio-inline\">
              <input " . ($empresa->getIdstatus() == 2?"checked":"") . " type=\"radio\" name=\"status\" value=\"2\"  style=\"margin-bottom: 10px\">
              Ativa
            </label>
            <label class=\"radio-inline\">
              <input " . ($empresa->getIdstatus() == 1?"checked":"") . " type=\"radio\" name=\"status\" value=\"1\"  style=\"margin-bottom: 10px\">
              Inativa
            </label>
          </div>
        </div>
        <div class=\"form-group required\">
          <label class=\"control-label col-md-4  requiredField\"> Nome Fantasia<span class=\"asteriskField\">*</span> </label>
          <div class=\"controls col-md-8 \">
            <input name=\"nome-fantasia\" value=\"" . $empresa->getTnomefantasia() . "\" class=\"input-md textinput textInput form-control\" id=\"nome-fantasia\" placeholder=\"O Nome Fantasia da Empresa aqui\" style=\"margin-bottom: 10px\" type=\"text\" />
          </div>
        </div>
        <div class=\"form-group required\">
          <label class=\"control-label col-md-4  requiredField\"> Razão Social<span class=\"asteriskField\">*</span> </label>
          <div class=\"controls col-md-8 \">
            <input name=\"razao-social\" value=\"" . $empresa->getTrazaosocial() . "\" class=\"input-md textinput form-control\" id=\"razao-social\" placeholder=\"A Razão Social da Empresa aqui\" style=\"margin-bottom: 10px\" type=\"text\" />
          </div>
        </div>
        <div class=\"form-group required\">
          <label class=\"control-label col-md-4  requiredField\"> CNPJ<span class=\"asteriskField\">*</span> </label>
          <div class=\"controls col-md-8 \">
            <input name=\"cnpj\" value=\"" . $empresa->getTcnpj() . "\" class=\"input-md textinput form-control\" id=\"cnpj\" placeholder=\"O CNPJ da Empresa aqui\" style=\"margin-bottom: 10px\" type=\"text\" />
          </div>
        </div>
        <div class=\"form-group required\">
          <label class=\"control-label col-md-4  requiredField\"> CPF do Responsável<span class=\"asteriskField\">*</span> </label>
          <div class=\"controls col-md-8 \">
            <input name=\"cpf-responsavel\" value=\"" . $empresa->getTcpfresponsavel() . "\" class=\"input-md textinput form-control\" id=\"cpf\" placeholder=\"O CPF do Responsável da Empresa aqui\" style=\"margin-bottom: 10px\" type=\"text\" />
          </div>
        </div>
        <div class=\"form-group required\">
          <label class=\"control-label col-md-4  requiredField\"> Inscrição Municipal<span class=\"asteriskField\">*</span> </label>
          <div class=\"controls col-md-8 \">
            <input name=\"inscricao-municipal\" value=\"" . $empresa->getTinscmunicipal() . "\" class=\"input-md textinput form-control\" id=\"inscricao-municipal\" placeholder=\"A Inscrição Municipal da Empresa aqui\" style=\"margin-bottom: 10px\" type=\"text\" />
          </div>
        </div>
        <div class=\"form-group required\">
          <label class=\"control-label col-md-4  requiredField\"> Inscrição Estadual<span class=\"asteriskField\">*</span> </label>
          <div class=\"controls col-md-8 \">
            <input name=\"inscricao-estadual\" value=\"" . $empresa->getTinscestadual() . "\" class=\"input-md textinput form-control\" id=\"inscricao-estadual\" placeholder=\"A Inscrição Estadual da Empresa aqui\" style=\"margin-bottom: 10px\" type=\"text\" />
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

  public function daoEmpresa(Request $request){
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
}
