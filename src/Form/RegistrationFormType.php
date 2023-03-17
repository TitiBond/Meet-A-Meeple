<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
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
            ->add('last_name')
            ->add('first_name')
            ->add('gender_id',ChoiceType::class, [
    'choices'  => [
        'Non précisé' => false,
        'Homme' => null,
        'Femme' => true,
        ]
    ])
            ->add('pseudo')
            ->add('birthdate')
            ->add('city')
            ->add('description')
            ->add('favorite_game')
            ->add('trait1_id',ChoiceType::class, [
                'choices'  => [
                    'Option 1' => false,
                    'Option 2' => null,
                    'Option 3' => true,
                    'Option 4' => true,
                    ]
                ])
            ->add('trait2_id',ChoiceType::class, [
                'choices'  => [
                    'Option 1' => false,
                    'Option 2' => null,
                    'Option 3' => true,
                    'Option 4' => true,
                    ]
                ])
            ->add('trait3_id',ChoiceType::class, [
                'choices'  => [
                    'Option 1' => false,
                    'Option 2' => null,
                    'Option 3' => true,
                    'Option 4' => true,
                    ]
                ])
            ->add('trait4_id',ChoiceType::class, [
                'choices'  => [
                    'Option 1' => false,
                    'Option 2' => null,
                    'Option 3' => true,
                    'Option 4' => true,
                    ]
                ])
            ->add('picture_profil', FileType::class)
            ->add('email')
            ->add('RGPDconsent', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
