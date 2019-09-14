<?php

namespace App\Form;

use App\Entity\TblComprobanteVenta;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TblComprobanteVentaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tipoVenta')
            ->add('fecha')
            ->add('serie')
            ->add('numeracion')
            ->add('subtotal')
            ->add('dsct')
            ->add('igv')
            ->add('total')
            ->add('cantidad')
            ->add('estado')
            ->add('idTipoComprobante')
            ->add('idCliente')
            ->add('idUsuario')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TblComprobanteVenta::class,
        ]);
    }
}
