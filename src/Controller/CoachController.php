<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CoachController extends AbstractController
{
    /**
     * @Route("/coach", name="coach")
     */
    public function index(): Response
    {
        return $this->render('coach/coach.html.twig', [
            'controller_name' => 'CoachController',
        ]);
    }


    /**
     * @Route("/discipline", name="discipline")
     */

    public function discipline(): Response
    {
        return $this->render('coach/discipline.html.twig', [
            'controller_name' => 'CoachController',
        ]);
    }


    /**
     * @Route("/contactcoach", name="contactcoach")
     */
    public function contactcoach(): Response
    {
        return $this->render('coach/contactcoach.html.twig', [
            'controller_name' => 'CoachController',
        ]);
    }
}
