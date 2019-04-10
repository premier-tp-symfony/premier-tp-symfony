<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('price', MoneyType::class, [
                'divisor' => 100
            ])
            ->add('category', ChoiceType::class,[
                'choices'   => array(
                    'categorie 1'   => 'categorie 1',
                    'categorie 2' =>   'categorie 2',
                    'categorie 3'   => 'categorie 3',
                    'categorie 4'   => 'categorie 4',
                    'categorie 5'   => 'categorie 5',
                ),
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}