<?php

declare(strict_types=1);

namespace App\Form\Utilisateur;

use App\Enum\Role;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Form\Utilisateur\RoleType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class CreateUtilisateurFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', TextType::class, [
                'constraints' => [
                    new NotBlank(message: 'L\'email d\'utilisateur doit être renseigné.'),
                ],
            ])
            ->add('password', TextType::class, [
                'constraints' => [
                    new NotBlank(message: 'Le mot de passe d\'utilisateur doit être renseigné.'),
                ],
            ])
            ->add('role', TextType::class, [
                'constraints' => [
                    new NotBlank(message: 'Le rôle d\'utilisateur doit être renseigné.'),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'csrf_protection' => false,
            'allow_extra_fields' => true,
        ]);
    }
}
