<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/product/{productName}", name="product")
     */
    public function index(int $productId)
    {
        $product = new Product();
        $product -> id = $productId;
        $product -> name = 'Clavier';


        return $this->render('product/detail.html.twig', [
            'product' => $product
        ]);
    }
}
class Product
{
    public $id;
    public $name;

    public function upperName()
    {
        return strtoupper($this->name);
    }
}
