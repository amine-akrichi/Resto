<?php

namespace App\Form;

use App\Entity\Reservation;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('ClientName', TextType::class, [
            'label' => 'Nom',
            'attr' => ['placeholder' => 'Votre Nom','class' => 'form-control'],
        ])
        ->add('ClientEmail', TextType::class, [
            'label' => 'Email',
            'attr' => ['placeholder' => 'Votre Email','class' => 'form-control'],
        ])
        ->add('ClientPhone', TextType::class, [
            'label' => 'Tel',
            'attr' => ['placeholder' => 'Tel','class' => 'form-control'],
        ])
        ->add('ReservationDate', TextType::class, [
            'label' => 'Date',
            'attr' => ['placeholder' => 'Date','class' => 'form-control'],
        ])
        ->add('ReservationTime', TextType::class, [
            'label' => 'Heure',
            'attr' => ['placeholder' => 'Heure','class' => 'form-control'],
        ])
        ->add('NumberOfPersons', IntegerType::class, [
            'label' => 'Personnes',
            'attr' => ['placeholder' => 'Personnes','class' => 'form-control'],
        ])
        ->add('submit', SubmitType::class, [
            'label' => 'Faire une réservation',
            'attr' => ['class' => 'btn btn-primary py-3 px-5'],
        ]);
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
