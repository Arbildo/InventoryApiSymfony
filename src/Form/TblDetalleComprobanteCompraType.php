<?php

namespace App\Form;

use App\Entity\TblDetalleComprobanteCompra;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TblDetalleComprobanteCompraType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cantidad')
            ->add('precio')
            ->add('estado')
            ->add('idProductoDetalle')
            ->add('idComprobante')
            ->add('idOrden')
            ->add('idLote')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TblDetalleComprobanteCompra::class,
        ]);
    }
}
