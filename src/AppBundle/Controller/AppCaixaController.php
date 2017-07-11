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

class AppCaixaController extends Controller
{
    /**
     * @Route("/app/caixa", name="app_caixa")
     */
    public function caixaApp(Request $request)
    {
        return $this->render('default/app-caixa.html.twig', [
          'session' => $_SESSION
        ]);
    }

    /**
    * @Route("/api/caixa/controle")
    */

    public function controleCaixa(Request $request)
    {
      try {
        $em = $this->getDoctrine()->getManager();

        // if ($request->request->get('id') == 0)
        //   $caixa = new Caixa();
        // else {
        //   $caixa = $this->em->createQuery ( 'SELECT e
        //     FROM AppBundle:Caixa e
        //     WHERE e.id = :id' )
        //     ->setParameter ( 'id', $request->request->get('id') )->getOneOrNullResult ();
        //   if (!$caixa) {
        //     die("Não consegui encontrar os dados sobre o caixa. Por favor, utilize a tecla F5");
        //   }
        //
        // }

        // $form =
        // "<form  class=\"form-horizontal\" method=\"post\" >
        //   <div class=\"form-group required\">
        //     <label class=\"control-label col-md-4  requiredField\">Status<span class=\"asteriskField\">*</span> </label>
        //     <div class=\"controls col-md-8 \"  style=\"margin-bottom: 10px\">
        //       <label " + ($caixa->getIdstatus() == 2?"checked":"") + " class=\"radio-inline\"> <input type=\"radio\" name=\"As\" value=\"2\"  style=\"margin-bottom: 10px\">Ativa </label>
        //       <label " + ($caixa->getIdstatus() == 1?"checked":"") + " class=\"radio-inline\"> <input type=\"radio\" name=\"As\" value=\"1\"  style=\"margin-bottom: 10px\">Inativa </label>
        //     </div>
        //   </div>
        //   <div class=\"form-group required\">
        //     <label for=\"id_username\" class=\"control-label col-md-4  requiredField\"> Nome Fantasia<span class=\"asteriskField\">*</span> </label>
        //     <div class=\"controls col-md-8 \">
        //       <input " + ($caixa->getTnomefantasia() + " class=\"input-md textinput textInput form-control\" id=\"nome-fantasia\" placeholder=\"O Nome Fantasia da Caixa aqui\" style=\"margin-bottom: 10px\" type=\"text\" />
        //     </div>
        //   </div>
        //   <div class=\"form-group required\">
        //     <label class=\"control-label col-md-4  requiredField\"> Razão Social<span class=\"asteriskField\">*</span> </label>
        //     <div class=\"controls col-md-8 \">
        //       <input " + ($caixa->getTrazaosocial() + " class=\"input-md textinput form-control\" id=\"razao-social\" placeholder=\"A Razão Social da Caixa aqui\" style=\"margin-bottom: 10px\" type=\"text\" />
        //     </div>
        //   </div>
        //   <div class=\"form-group required\">
        //     <label class=\"control-label col-md-4  requiredField\"> CNPJ<span class=\"asteriskField\">*</span> </label>
        //     <div class=\"controls col-md-8 \">
        //       <input " + ($caixa->getTcnpj() + " class=\"input-md textinput form-control\" id=\"cnpj\" placeholder=\"O CNPJ da Caixa aqui\" style=\"margin-bottom: 10px\" type=\"text\" />
        //     </div>
        //   </div>
        //   <div class=\"form-group required\">
        //     <label class=\"control-label col-md-4  requiredField\"> CPF do Responsável<span class=\"asteriskField\">*</span> </label>
        //     <div class=\"controls col-md-8 \">
        //       <input " + ($caixa->getTcpfresponsavel() + " class=\"input-md textinput form-control\" id=\"cpf\" placeholder=\"O CPF do Responsável da Caixa aqui\" style=\"margin-bottom: 10px\" type=\"text\" />
        //     </div>
        //   </div>
        //   <div class=\"form-group required\">
        //     <label class=\"control-label col-md-4  requiredField\"> Inscrição Municipal<span class=\"asteriskField\">*</span> </label>
        //     <div class=\"controls col-md-8 \">
        //       <input " + ($caixa->getTinscmunicipal() + " class=\"input-md textinput form-control\" id=\"inscricao-municipal\" placeholder=\"A Inscrição Municipal da Caixa aqui\" style=\"margin-bottom: 10px\" type=\"text\" />
        //     </div>
        //   </div>
        //   <div class=\"form-group required\">
        //     <label class=\"control-label col-md-4  requiredField\"> Inscrição Estadual<span class=\"asteriskField\">*</span> </label>
        //     <div class=\"controls col-md-8 \">
        //       <input " + ($caixa->getTinscestadual() + " class=\"input-md textinput form-control\" id=\"inscricao-estadual\" placeholder=\"A Inscrição Estadual da Caixa aqui\" style=\"margin-bottom: 10px\" type=\"text\" />
        //     </div>
        //   </div>
        //   <div class=\"form-group\">
        //     <div class=\"controls col-md-offset-4 col-md-8 \">
        //       <div id=\"div_id_terms\" class=\"checkbox required\">
        //         <label for=\"id_terms\" class=\" requiredField\">
        //         <input class=\"input-ms checkboxinput
        //         id=\"id_terms\" name=\"terms\" style=\"margin-bottom: 10px\" type=\"checkbox\" />
        //         Concordo que todas as informações acima são inteiramente de minha responsabilidade
        //         </label>
        //       </div>
        //     </div>
        //   </div>
        //   <div class=\"form-group\">
        //     <div class=\"aab controls col-md-4 \"></div>
        //     <div class=\"controls col-md-8 \">
        //       <input type=\"button\" name=\"Signup\" value=\"Salvar\" class=\"btn btn-primary btn-lg btn-info\" />
        //     </div>
        //   </div>
        // </form>";
        // return $form;
      } catch (Exception $e) {
        die(var_dump($e));
      }
    }
}
