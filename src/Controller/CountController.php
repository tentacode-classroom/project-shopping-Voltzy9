<?php

namespace App\Controller;

use App\Entity\Peripheral;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\PeripheralRepository;
use Symfony\Component\Routing\Annotation\Route;


class CountController extends AbstractController
{
    /**
     * @Route("/Myaccount", name="count")
     */
    public function index()
    {
        $doctrine = $this->getDoctrine();
        $peripheralRepository = $doctrine->getRepository(Peripheral::class);
        $peripherals = $peripheralRepository->findAll();


        return $this->render('count/index.html.twig', [
            'peripherals' => $peripherals,
        ]);
    }
}
