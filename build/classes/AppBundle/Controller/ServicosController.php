<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ServicosController extends Controller
{
    /**
     * @Route("/servicos", name="servicos")
     */
    public function indexServicos(Request $request)
    {
        return $this->render('default/servicos.html.twig');
    }
}
