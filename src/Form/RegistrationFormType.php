<?php

namespace App\Form;

use App\Entity\Utilisateurs;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;


class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('roles', ChoiceType::class, [
                'label' => 'Choisissez vos rôles : ',
                'choices' => [
                    'Supporter' =>'ROLE_SUPPORTER',
                    'Joueur' => 'ROLE_JOUEUR',
                    'Entraîneur' => 'ROLE_ENTRAINEUR',
                    'President' => 'ROLE_PRESIDENT',
                ],
                'multiple' => true, 
                'expanded' => true, // si je veux afficher les choix comme des cases à cocher
            ])
            ->add('nom', TextType::class, [
                'label'=> false,
                'attr' => [
                    'placeholder' => 'Nom',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez renseignez votre Nom'
                    ])
                ]
            ])
            ->add('prenom', TextType::class, [
                'label'=> false,
                'attr' => [
                    'placeholder' => 'Prenom',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez renseignez votre Prenom'
                    ])
                ]
            ])
            ->add('annee_naissance', DateType::class, [
                'label'=> 'Année de Naissance',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez renseigner votre Date de Naissance (YYYY/MM/DD)'
                    ])
                ],
                'years' => range(time() - 30, date('Y') + 10),
                'format' => 'dd/MM/yyyy',
            ])
            ->add('email', EmailType::class, [
                'label'=> false,    
                'attr' => [
                    'placeholder' => 'Adresse Mail',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez renseigner votre Date de Naissance (YYYY/MM/DD)'
                    ])
                ],
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'label' => "Veuillez acceptez les conditions d'utilisations.",
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => "Veuillez cochez les conditions d'utilisations.",
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                'mapped' => false,
                'label'=> false,
                'attr' => [
                    'placeholder' => 'Mot de Passe',
                    'autocomplete' => 'new-password'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez renseigner votre Mot de Passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre Mot de Passe doit contenir au minimum {{ limit }} caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateurs::class,
        ]);
    }
}
