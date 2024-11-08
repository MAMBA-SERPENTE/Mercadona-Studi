<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function login(AuthenticationUtils$authenticationUtils): Response {
        if($this->getUser()) {
            return $this->redirectToRoute('home');
        }

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUserAdmin = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig',[
            'last_useradmin' => $lastUserAdmin,
            'error' => $error,
        ]);
    }

    #[Route('logout', name:'app_logout')]
    public function logout() {
        throw new \Exception();
    }
}