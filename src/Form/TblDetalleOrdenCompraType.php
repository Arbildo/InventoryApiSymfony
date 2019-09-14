<?php

namespace App\Form;

use App\Entity\TblDetalleOrdenCompra;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TblDetalleOrdenCompraType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('precio')
            ->add('cantidad')
            ->add('estado')
            ->add('idOrden')
            ->add('idProductoDetalle')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TblDetalleOrdenCompra::class,
        ]);
    }
}
