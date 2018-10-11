<?php

namespace App\Controller;

use App\Entity\Peripheral;
use App\Form\PeripheralType;
use App\Repository\PeripheralRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/peripheral")
 */
class PeripheralController extends AbstractController
{
    /**
     * @Route("/", name="peripheral_index", methods="GET")
     */
    public function index(PeripheralRepository $peripheralRepository): Response
    {
        return $this->render('peripheral/index.html.twig', ['peripherals' => $peripheralRepository->findAll()]);
    }

    /**
     * @Route("/new", name="peripheral_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $peripheral = new Peripheral();
        $form = $this->createForm(PeripheralType::class, $peripheral);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($peripheral);
            $em->flush();

            return $this->redirectToRoute('peripheral_index');
        }

        return $this->render('peripheral/new.html.twig', [
            'peripheral' => $peripheral,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="peripheral_show", methods="GET")
     */
    public function show(Peripheral $peripheral): Response
    {
        return $this->render('peripheral/show.html.twig', ['peripheral' => $peripheral]);
    }

    /**
     * @Route("/{id}/edit", name="peripheral_edit", methods="GET|POST")
     */
    public function edit(Request $request, Peripheral $peripheral): Response
    {
        $form = $this->createForm(PeripheralType::class, $peripheral);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('peripheral_edit', ['id' => $peripheral->getId()]);
        }

        return $this->render('peripheral/edit.html.twig', [
            'peripheral' => $peripheral,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="peripheral_delete", methods="DELETE")
     */
    public function delete(Request $request, Peripheral $peripheral): Response
    {
        if ($this->isCsrfTokenValid('delete'.$peripheral->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($peripheral);
            $em->flush();
        }

        return $this->redirectToRoute('peripheral_index');
    }
}
