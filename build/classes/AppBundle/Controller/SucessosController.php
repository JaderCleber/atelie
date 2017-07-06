<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SucessosController extends Controller
{
    /**
     * @Route("/sucessos", name="sucessos")
     */
    public function indexSucessos(Request $request)
    {
        return $this->render('default/sucessos.html.twig');
    }
}
