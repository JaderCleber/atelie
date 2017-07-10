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

class AppProdutosController extends Controller
{
    /**
     * @Route("/app/produtos", name="app_produtos")
     */
    public function produtosApp(Request $request)
    {
        return $this->render('default/app-produtos.html.twig', [
          'session' => $_SESSION
        ]);
    }
}
