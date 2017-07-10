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
}
