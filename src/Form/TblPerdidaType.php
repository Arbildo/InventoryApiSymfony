<?php

namespace App\Form;

use App\Entity\TblPerdida;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TblPerdidaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codigo')
            ->add('fecha')
            ->add('cantidad')
            ->add('descripcion')
            ->add('estado')
            ->add('idDetalleProducto')
            ->add('idLote')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TblPerdida::class,
        ]);
    }
}
