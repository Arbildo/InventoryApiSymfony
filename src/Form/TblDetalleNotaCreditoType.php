<?php

namespace App\Form;

use App\Entity\TblDetalleNotaCredito;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TblDetalleNotaCreditoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cantidad')
            ->add('precio')
            ->add('estado')
            ->add('idDetalleComprobanteVenta')
            ->add('idNotaCredito')
            ->add('idDetalleProducto')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TblDetalleNotaCredito::class,
        ]);
    }
}
