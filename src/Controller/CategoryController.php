<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category", name="category")
     */
    public function index()
    {$this->render('categories/categories.html.twig', [
        'products' => [
            new Product()->setName("Produit 1")->setDescription("Lorem ipsum dolor sit amet consectetur adipisicing elit.")->setPrice(99)->setImage("https://dummyimage.com/600x400/55595c/fff"),
            new Product()->setName("Produit 2")->setDescription("Lorem ipsum dolor sit amet consectetur adipisicing elit.")->setPrice(99)->setImage("https://dummyimage.com/600x400/55595c/fff"),
            new Product()->setName("Produit 3")->setDescription("Lorem ipsum dolor sit amet consectetur adipisicing elit.")->setPrice(99)->setImage("https://dummyimage.com/600x400/55595c/fff")
        ],
        'lastProduct' => new Product()->setName("Produit 3")->setDescription("Lorem ipsum dolor sit amet consectetur adipisicing elit.")->setPrice(99)->setImage("https://dummyimage.com/600x400/55595c/fff"),
        'page' => 2
]);
    }
}
