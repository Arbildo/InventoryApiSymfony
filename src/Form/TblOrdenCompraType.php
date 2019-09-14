<?php

namespace App\Form;

use App\Entity\TblOrdenCompra;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TblOrdenCompraType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codigo')
            ->add('fecha')
            ->add('total')
            ->add('cantidad')
            ->add('estado')
            ->add('idProveedor')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TblOrdenCompra::class,
        ]);
    }
}
