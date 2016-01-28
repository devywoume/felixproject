<?php

namespace FelixBundle\Form;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PanierType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, array(
                'attr' => array(
                    'class' => 'inputform',
                    'placeholder' => 'Nom complet'
                )
            ))
            ->add('lastname', TextType::class, array(
                'attr' => array(
                    'placeholder' => 'Prénom'
                )
            ))
            ->add('datecommande', DateType::class, array(
                'attr' => array(
                    'placeholder' => 'Date commande'
                )
            ))
            ->add('lignespanier', CollectionType::class ,array(
                'entry_type' => LignepanierType::class ,
                'allow_add' => true,
                'allow_delete' => true

            ))
            ->add('submit', SubmitType::class)
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FelixBundle\Entity\Panier'
        ));
    }
}
