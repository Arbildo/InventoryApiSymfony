<?php

namespace App\Form;

use App\Entity\TblComprobanteCompra;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TblComprobanteCompraType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('serie')
            ->add('numeracion')
            ->add('subtotal')
            ->add('igv')
            ->add('total')
            ->add('cantidad')
            ->add('fecha')
            ->add('estado')
            ->add('idProveedor')
            ->add('idTipoComprobante')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TblComprobanteCompra::class,
        ]);
    }
}
