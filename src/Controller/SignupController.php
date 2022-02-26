<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SignupController extends AbstractController
{
    /**
     * @Route("/signup", name="signup")
     */
    public function inscription(): Response
    {
        return $this->render('Connexion/membre.html.twig', [
            'controller_name' => 'SignupController',
        ]);
    }
}
