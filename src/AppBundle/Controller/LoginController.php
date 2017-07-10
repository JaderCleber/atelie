<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Usuario;
use AppBundle\Dao\DaoUsuario;
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
      			$dao->setLogin ( $form ['tLogin']->getData () );
      			$dao->setSenha ( $form ['tSenha']->getData () );
      			$usuario = $dao->exec ( $this->getDoctrine ()->resetManager () );

      			if (is_int ( $usuario )){
              $_SESSION ['idUsuario'] = $usuario;
              return $this->redirectToRoute ( 'app_main' );
      			} else {
              die($usuario);
      			}
      		} catch ( \Exception $e ) {
      			die('Algum erro aconteceu comigo. Sinto muito.');
      		}
    		}

        return $this->render('default/login.html.twig', array('form'=>$form->createView ()));
      } catch (Exception $e) {
        die(var_dump($e));
      }
    }
}
