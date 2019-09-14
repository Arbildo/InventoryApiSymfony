<?php

namespace App\Form;

use App\Entity\TblDetalleComprobanteVenta;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TblDetalleComprobanteVentaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cantidad')
            ->add('precio')
            ->add('estado')
            ->add('idComprobanteVenta')
            ->add('idProductoDetalle')
            ->add('idPedido')
            ->add('idLote')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TblDetalleComprobanteVenta::class,
        ]);
    }
}
