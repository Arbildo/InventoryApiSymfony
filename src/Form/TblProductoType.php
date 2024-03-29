<?php

namespace App\Form;

use App\Entity\TblProducto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TblProductoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('codigo')
            ->add('descripcion')
            ->add('idTipo',   TblTipoProductoType::class)
            ->add('idUnidad', TblUnidadMedidaType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TblProducto::class,
        ]);
    }
}
