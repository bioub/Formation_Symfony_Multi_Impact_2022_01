<?php

namespace App\Form;

use App\Entity\Contact;
use App\Entity\Groupe;
use App\Entity\Societe;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('email', EmailType::class)
            // ->add('submit', SubmitType::class)
            ->add('societe', EntityType::class, [
                'class' => Societe::class,
                'choice_label' => 'nom',
                'empty_data' => '',
                'required' => false
            ])
            ->add('groupes', EntityType::class, [
                'class' => Groupe::class,
                'multiple' => true,
                'expanded' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
            /*'attr' => [
                'novalidate' => 'novalidate'
            ]*/
        ]);
    }
}
