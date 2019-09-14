<?php

namespace App\Form;

use App\Entity\TblDetallePedido;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TblDetallePedidoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cantidad')
            ->add('precio')
            ->add('estado')
            ->add('idPedido')
            ->add('idProductoDetalle')
            ->add('idLote')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TblDetallePedido::class,
        ]);
    }
}
