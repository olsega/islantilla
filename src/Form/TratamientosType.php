<?php

namespace App\Form;

use App\Entity\Tratamientos;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TratamientosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('id_tratamiento')
            ->add('nombre_tratamiento')
            ->add('precio')
            ->add('activo')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Tratamientos::class,
        ]);
    }
}
