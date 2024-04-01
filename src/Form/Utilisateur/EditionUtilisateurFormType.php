<?php

declare(strict_types=1);

namespace App\Form\Utilisateur;

use App\Enum\Role;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class EditionUtilisateurFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('role', EnumType::class, [
                'class' => Role::class,
                'constraints' => [
                    new NotBlank(message: 'Le rôle doit être renseignée.'),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
            'csrf_protection' => false,
            'allow_extra_fields' => true,
        ]);
    }
}
