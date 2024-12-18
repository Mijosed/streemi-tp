<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class PasswordResetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Adresse email',
                'disabled' => true,
            ])
            ->add('plainPassword', PasswordType::class, [
                'label' => 'Nouveau mot de passe',
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Le mot de passe ne peut pas être vide.',
                    ]),
                    new Assert\Length([
                        'min' => 8,
                        'minMessage' => 'Le mot de passe doit contenir au moins {{ limit }} caractères.',
                    ]),
                ],
            ])
            ->add('repeatPassword', PasswordType::class, [
                'label' => 'Répéter le mot de passe',
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Veuillez répéter le mot de passe.',
                    ]),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([]);
    }
}