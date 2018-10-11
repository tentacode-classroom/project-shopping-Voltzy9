<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\PeripheralRepository;
use App\Entity\Peripheral;

class ProductController extends AbstractController
{
    /**
     * @Route("/product/{productId}", name="product")
     */

    public function show($productId)
    {
        $product = $this->getDoctrine()
            ->getRepository(Peripheral::class)
            ->find($productId);

        if(!$product){
            throw $this->createNotFoundException(
                'No product found for this id'.$productId
            );
        }
        return $this->render('product/index.html.twig', [
            'peripheral' => $product,
        ]);
        //return new Response('Check out this great product '.$product->getName());

    }
}


