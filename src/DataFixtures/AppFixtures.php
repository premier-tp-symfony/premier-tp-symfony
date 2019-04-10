<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Cocur\Slugify\SlugifyInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    /**
     * @var SlugifyInterface
     */
    private $slugify;

    public function __construct(SlugifyInterface $slugify)
    {
        $this->slugify = $slugify;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');


        // Création des produits
        for ($i = 1; $i <= 100; $i++) {
            $product = new Product();
            $product->setName($faker->randomElement([
                'Produit 1', 'Produit 2', 'Produit 3', 'Produit 4', 'Produit 5'
            ]));
            $product->setName($faker->randomElement([
                'categorie 1', 'categorie 2', 'categorie 3', 'categorie 4', 'categorie 5'
            ]));
            $product->setDescription($faker->text(300));
            $product->setPrice($faker->randomNumber(5) * 100);
            // Je génère un slug
            // $this->slugify->slugify('iPhone X'); // iphone-x
            $slug = $this->slugify->slugify($product->getName());
            $product->setSlug($slug);
            $manager->persist($product);
        }

        $manager->flush();
    }
}
