<?php

namespace App\Form;

use App\Entity\TblVentaDetalleProducto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TblVentaDetalleProductoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idVenta')
            ->add('idProductoDetall')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TblVentaDetalleProducto::class,
        ]);
    }
}
