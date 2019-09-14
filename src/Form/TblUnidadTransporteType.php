<?php

namespace App\Form;

use App\Entity\TblUnidadTransporte;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TblUnidadTransporteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numPlaca')
            ->add('marca')
            ->add('licencia')
            ->add('estado')
            ->add('idEmpresa')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TblUnidadTransporte::class,
        ]);
    }
}
