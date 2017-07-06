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
    	$form = $this->createFormBuilder ( new Usuario (), array (
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
    					'class' => 'form-control input-sm chat-input'
    			)
    	) )->add ( 'tSenha', PasswordType::class, array (
    			'label_attr' => array (
    					'style' => 'display:none'
    			),
    			'attr' => array (
    					'id'=>"userPassword",
    					'placeholder'=>"senha",
    					'class' => 'form-control input-sm chat-input'
    			)
    	) )->getForm ();
        return $this->render('default/login.html.twig', array('form'=>$form));
//         return $this->render('default/login.html.twig');
    }
}
