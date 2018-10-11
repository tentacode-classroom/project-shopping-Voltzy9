<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Entity\Peripheral;

class BasketController extends AbstractController
{
    /**
     * @Route("/panier", name="basket_list")
     */
    public function index(SessionInterface $session)
    {
        $basketProducts = $session->get('basket_products', []);
        $peripheralRepository = $this->getDoctrine()->getRepository(Peripheral::class);

        $peripherals = [];
        foreach($basketProducts as $productId) {
            $peripheral = $peripheralRepository->find($productId);
            $peripherals[] = $peripheral;
        }
        return $this->render('basket/index.html.twig', [
            'basket_products' => $peripherals,
        ]);
    }
    /**
     * @Route("/panier/ajouter/{productId}", name="basket_add")
     */
    public function add(int $productId, SessionInterface $session)
    {
        $basketProducts = $session->get('basket_products', []);
        if (!in_array($productId, $basketProducts)) {
            $basketProducts[] = $productId;
            $this->addFlash(
                'notice',
                'Produit bien ajouté !'
            );
        }
        $session->set('basket_products', $basketProducts);
        return $this->redirectToRoute('basket_list');
    }
    /**
     * @Route("/panier/supprimer/{productId}", name="basket_remove")
     */
    public function remove(int $productId, SessionInterface $session)
    {
        $basketProducts = $session->get('basket_products', []);

        $productIndex = array_search($productId, $basketProducts);
        if (false !== $productIndex) {
            unset($basketProducts[$productIndex]);
            $this->addFlash(
                'notice',
                'Produit bien supprimé !'
            );
        }
        $session->set('basket_products', $basketProducts);
        return $this->redirectToRoute('basket_list');
    }
}
