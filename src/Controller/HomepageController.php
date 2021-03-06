<?php

namespace App\Controller;

use App\Entity\Peripheral;
use App\Repository\PeripheralRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        $doctrine = $this->getDoctrine();
        $peripheralRepository = $doctrine->getRepository(Peripheral::class);
        $peripherals = $peripheralRepository->findAllPeripheral();

        return $this->render('homepage/index.html.twig', [
            'peripherals' => $peripherals,
        ]);
    }
}
