<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CategoriesController extends AbstractController
{
    /**
     * @Route("/categories", name="categories")
     */
    public function index()
    {
        return $this->render('categories/categories.html.twig');
    }
}
