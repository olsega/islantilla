<?php

namespace App\Form;

use App\Entity\Citas;
use App\Entity\Tratamientos;
use App\Entity\Usuarios;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CrearCitasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('id_cita')
            ->add('fecha', null, [
                'widget' => 'single_text',
            ])
            ->add('pagado')
            ->add('activo')
            ->add('dni', EntityType::class, [
                'class' => Usuarios::class,
                'choice_label' => 'id',
            ])
            ->add('id_tratamiento', EntityType::class, [
                'class' => Tratamientos::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Citas::class,
        ]);
    }
}
