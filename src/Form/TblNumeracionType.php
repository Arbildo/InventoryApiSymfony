<?php

namespace App\Form;

use App\Entity\TblNumeracion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TblNumeracionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('serie')
            ->add('inicio')
            ->add('fin')
            ->add('estado')
            ->add('idTipoComprobante')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TblNumeracion::class,
        ]);
    }
}
