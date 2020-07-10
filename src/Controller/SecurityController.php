<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // var_dump($authenticationUtils);
        if ($this->getUser()) {
            // return new RedirectResponse($this->urlGenerator->generate('admin'));
            return new RedirectResponse('admin');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('@EasyAdmin/page/login.html.twig', [
             // parameters usually defined in Symfony login forms
             'error' => $error,
             'last_username' => $lastUsername,
 
             // OPTIONAL parameters to customize the login form:
 
             // the translation_domain to use (define this option only if you are
             // rendering the login template in a regular Symfony controller; when
             // rendering it from an EasyAdmin Dashboard this is automatically set to
             // the same domain as the rest of the Dashboard)
             'translation_domain' => 'admin',
 
             // the title visible above the login form (define this option only if you are
             // rendering the login template in a regular Symfony controller; when rendering
             // it from an EasyAdmin Dashboard this is automatically set as the Dashboard title)
             'page_title' => 'Volvox Login',
 
             // the string used to generate the CSRF token. If you don't define
             // this parameter, the login form won't include a CSRF token
             'csrf_token_intention' => 'authenticate',
 
             // the label displayed for the username form field (the |trans filter is applied to it)
             'username_label' => 'Usuário',
 
             // the label displayed for the password form field (the |trans filter is applied to it)
             'password_label' => 'Senha',
 
             // the label displayed for the Sign In form button (the |trans filter is applied to it)
             'sign_in_label' => 'Fazer login',
 
             // the 'name' HTML attribute of the <input> used for the username field (default: '_username')
             'username_parameter' => 'inputEmail',
             // the 'name' HTML attribute of the <input> used for the password field (default: '_password')
             'password_parameter' => 'inputPassword',
         
        ]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    public function redirectFromLogin(){
        return new RedirectResponse('login');
    }

}
