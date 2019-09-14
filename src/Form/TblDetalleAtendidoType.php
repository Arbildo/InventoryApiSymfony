<?php

namespace App\Form;

use App\Entity\TblDetalleAtendido;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TblDetalleAtendidoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cantidad')
            ->add('estado')
            ->add('idAtendido')
            ->add('idDetallePedido')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TblDetalleAtendido::class,
        ]);
    }
}
