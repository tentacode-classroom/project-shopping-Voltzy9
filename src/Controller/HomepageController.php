<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        $products = [
            [
                'id'=> 1,
                'name'=>'clavier razer',
            ],
            [
                'id'=>2,
                'name'=>'souris imperator',
            ],
            [
                'id'=>3,
                'name'=>'tapis de souris BF3',
            ],
        ];

        return $this->render('homepage/index.html.twig', [
            'products' => $products,
        ]);
    }
}
