<?php

namespace App\Controller;

use App\Entity\Vip;
use App\Form\VipType;
use App\Repository\VipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/vip")
 */
class VipController extends AbstractController
{
    /**
     * @Route("/", name="app_vip_index", methods={"GET"})
     */
    public function index(VipRepository $vipRepository): Response
    {
        return $this->render('vip/index.html.twig', [
            'vips' => $vipRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_vip_new", methods={"GET", "POST"})
     */
    public function new(Request $request, VipRepository $vipRepository): Response
    {
        $vip = new Vip();
        $form = $this->createForm(VipType::class, $vip);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $vipRepository->add($vip);
            return $this->redirectToRoute('app_vip_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('vip/new.html.twig', [
            'vip' => $vip,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_vip_show", methods={"GET"})
     */
    public function show(Vip $vip): Response
    {
        return $this->render('vip/show.html.twig', [
            'vip' => $vip,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_vip_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Vip $vip, VipRepository $vipRepository): Response
    {
        $form = $this->createForm(VipType::class, $vip);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $vipRepository->add($vip);
            return $this->redirectToRoute('app_vip_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('vip/edit.html.twig', [
            'vip' => $vip,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_vip_delete", methods={"POST"})
     */
    public function delete(Request $request, Vip $vip, VipRepository $vipRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$vip->getId(), $request->request->get('_token'))) {
            $vipRepository->remove($vip);
        }

        return $this->redirectToRoute('app_vip_index', [], Response::HTTP_SEE_OTHER);
    }
}
