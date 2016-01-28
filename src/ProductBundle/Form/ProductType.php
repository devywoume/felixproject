<?php

namespace ProductBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ProductType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('image')
            ->add('designation', TextType::class, array(
                'attr' => array(
                    'placeholder' => 'Désignation'
                )
            ))
            ->add('prixUnitaire', TextType::class, array(
                'attr' => array(
                    'placeholder' => 'Prix Unitaire'
                )
            ))
            ->add('description', TextareaType::class, array(
                'attr' => array(
                    'placeholder' => 'Description'
                )
            ))
            ->add('category', EntityType::class, array(
                'class' => 'DBBundle:Category',
                'choice_label' => 'category'
            ))
            ->add('unite', EntityType::class, array(
                'class' => 'DBBundle:Unite',
                'choice_label' => 'unite'
            ));
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DBBundle\Entity\Product'
        ));
    }
}
