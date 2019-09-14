<?php

namespace App\Form;

use App\Entity\TblNotaCredito;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TblNotaCreditoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fecha')
            ->add('motivo')
            ->add('numSerie')
            ->add('numeracion')
            ->add('subtotal')
            ->add('igv')
            ->add('total')
            ->add('estado')
            ->add('idComprobanteVenta')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TblNotaCredito::class,
        ]);
    }
}
