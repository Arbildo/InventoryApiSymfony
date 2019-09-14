<?php

namespace App\Form;

use App\Entity\TblProductoDetalle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TblProductoDetalleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('stockInicial')
            ->add('stockMinimo')
            ->add('precio')
            ->add('estado')
            ->add('idProducto')
            ->add('idTalla')
            ->add('idLote')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TblProductoDetalle::class,
        ]);
    }
}
