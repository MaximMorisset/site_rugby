<?php

namespace App\Form;

use App\Entity\Club;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Validator\Constraints\NotBlank;

class ClubType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label'=> 'Nom',
                'attr' => [
                    'placeholder' => 'Nom',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir votre Nom'
                    ])
                ]
            ])
            ->add('terrains', TextType::class, [
                'label'=> 'Adresse du Terrain', 
                'attr' => [
                    'placeholder' => 'Adresse du Terrain'
                ],
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message'=> "Veuillez saisir l'adresse du Terrain" 
                    ])
                ]
            ])
            ->add('telephone', TelType::class, [
                'label'=> 'Numéro de Téléphone', 
                'attr' => [
                    'placeholder' => 'Numéro de Télephone'
                ],
                'constraints' => [
                    new NotBlank([
                        'message'=> "Veuillez saisir le Numéro de Telephone" 
                    ])
                ]
            ])
            ->add('clubhouse', TextType::class, [
                'label'=> 'Adresse du ClubHouse', 
                'attr' => [
                    'placeholder' => 'Adresse du ClubHouse'
                ],
                'constraints' => [
                    new NotBlank([
                        'message'=> "Veuillez saisir l'adresse du ClubHouse'" 
                    ])
                ]
            ])
            ->add('code_postale', IntegerType::class,[
                'label'=> 'Code Postale du Club', 
                'attr' => [
                    'placeholder' => 'Code Postale du Club'
                ],
                'constraints' => [
                    new NotBlank([
                        'message'=> "Veuillez saisir le Code Postale du Club'" 
                    ])
                ]
            ])
            ->add('ville', TextType::class,[
                'label'=> 'Ville du Club', 
                'attr' => [
                    'placeholder' => 'Ville du Club'
                ],
                'constraints' => [
                    new NotBlank([
                        'message'=> "Veuillez saisir la Ville du Club'" 
                    ])
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Club::class,
        ]);
    }
}
