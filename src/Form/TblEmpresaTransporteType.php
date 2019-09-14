<?php

namespace App\Form;

use App\Entity\TblEmpresaTransporte;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TblEmpresaTransporteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codigo')
            ->add('ruc')
            ->add('razonSocial')
            ->add('direccion')
            ->add('telefono')
            ->add('estado')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TblEmpresaTransporte::class,
        ]);
    }
}
