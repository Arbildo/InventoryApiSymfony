<?php

namespace App\Form;

use App\Entity\TblPedido;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TblPedidoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codigo')
            ->add('fechaPedido')
            ->add('horaPedido')
            ->add('fechaEntrega')
            ->add('fechaAtencion')
            ->add('subtotal')
            ->add('cantidad')
            ->add('finalizado')
            ->add('estado')
            ->add('estadoComprobante')
            ->add('idUsuarioAsignado')
            ->add('idCliente')
            ->add('idEncargado')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TblPedido::class,
        ]);
    }
}
