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
    $query = $em->createQuery ( 'SELECT e.id, e.trazaosocial
      FROM AppBundle:Empresa e ORDER BY e.trazaosocial ASC' );
    $empresas = $query->getResult ();

    return $this->render('default/app-empresas.html.twig', [
      'session' => $_SESSION,
      'empresas' => $empresas
    ]);
  }

  /**
  * @Route("/api/empresa/controle", name="api_controle_empresa")
  */

  public function controleEmpresa(Request $request){
    try {
      $em = $this->getDoctrine()->getManager();

      if ($request->request->get('id') == 0){
        $empresa = new Empresa();
        $empresa->setIdstatus(2);
      } else {
        $empresa = $this->em->createQuery ( 'SELECT e
          FROM AppBundle:Empresa e
          WHERE e.id = :id' )
          ->setParameter ( 'id', $request->request->get('id') )->getOneOrNullResult ();
        if (!$empresa) {
          die("Não consegui encontrar os dados sobre a empresa. Por favor, utilize a tecla F5");
        }

      }
      $retorno = "<form  class=\"form-horizontal\" method=\"post\" >
        <div class=\"form-group required\">
          <label class=\"control-label col-md-4  requiredField\">Status<span class=\"asteriskField\">*</span> </label>
          <div class=\"controls col-md-8 \"  style=\"margin-bottom: 10px\">
            <label " . ($empresa->getIdstatus() == 2?"checked":"") . " class=\"radio-inline\"> <input type=\"radio\" name=\"status\" value=\"2\"  style=\"margin-bottom: 10px\">Ativa </label>
            <label " . ($empresa->getIdstatus() == 1?"checked":"") . " class=\"radio-inline\"> <input type=\"radio\" name=\"status\" value=\"1\"  style=\"margin-bottom: 10px\">Inativa </label>
          </div>
        </div>
        <div class=\"form-group required\">
          <label class=\"control-label col-md-4  requiredField\"> Nome Fantasia<span class=\"asteriskField\">*</span> </label>
          <div class=\"controls col-md-8 \">
            <input name=\"nome-fantasia\" " . $empresa->getTnomefantasia() . " class=\"input-md textinput textInput form-control\" id=\"nome-fantasia\" placeholder=\"O Nome Fantasia da Empresa aqui\" style=\"margin-bottom: 10px\" type=\"text\" />
          </div>
        </div>
        <div class=\"form-group required\">
          <label class=\"control-label col-md-4  requiredField\"> Razão Social<span class=\"asteriskField\">*</span> </label>
          <div class=\"controls col-md-8 \">
            <input name=\"razao-social\" " . $empresa->getTrazaosocial() . " class=\"input-md textinput form-control\" id=\"razao-social\" placeholder=\"A Razão Social da Empresa aqui\" style=\"margin-bottom: 10px\" type=\"text\" />
          </div>
        </div>
        <div class=\"form-group required\">
          <label class=\"control-label col-md-4  requiredField\"> CNPJ<span class=\"asteriskField\">*</span> </label>
          <div class=\"controls col-md-8 \">
            <input name=\"cnpj\" " . $empresa->getTcnpj() . " class=\"input-md textinput form-control\" id=\"cnpj\" placeholder=\"O CNPJ da Empresa aqui\" style=\"margin-bottom: 10px\" type=\"text\" />
          </div>
        </div>
        <div class=\"form-group required\">
          <label class=\"control-label col-md-4  requiredField\"> CPF do Responsável<span class=\"asteriskField\">*</span> </label>
          <div class=\"controls col-md-8 \">
            <input name=\"cpf-responsavel\" " . $empresa->getTcpfresponsavel() . " class=\"input-md textinput form-control\" id=\"cpf\" placeholder=\"O CPF do Responsável da Empresa aqui\" style=\"margin-bottom: 10px\" type=\"text\" />
          </div>
        </div>
        <div class=\"form-group required\">
          <label class=\"control-label col-md-4  requiredField\"> Inscrição Municipal<span class=\"asteriskField\">*</span> </label>
          <div class=\"controls col-md-8 \">
            <input name=\"inscricao-municipal\" " . $empresa->getTinscmunicipal() . " class=\"input-md textinput form-control\" id=\"inscricao-municipal\" placeholder=\"A Inscrição Municipal da Empresa aqui\" style=\"margin-bottom: 10px\" type=\"text\" />
          </div>
        </div>
        <div class=\"form-group required\">
          <label class=\"control-label col-md-4  requiredField\"> Inscrição Estadual<span class=\"asteriskField\">*</span> </label>
          <div class=\"controls col-md-8 \">
            <input name=\"inscricao-estadual\" " . $empresa->getTinscestadual() . " class=\"input-md textinput form-control\" id=\"inscricao-estadual\" placeholder=\"A Inscrição Estadual da Empresa aqui\" style=\"margin-bottom: 10px\" type=\"text\" />
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
            <input type=\"button\" name=\"Signup\" value=\"Salvar\" class=\"btn btn-primary btn-lg btn-info\" />
          </div>
        </div>
      </form>";
      die($retorno);
    } catch (Exception $e) {
      die(var_dump($e));
    }
  }
}
