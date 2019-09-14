<?php

namespace App\Form;

use App\Entity\TblCliente;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TblClienteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codigo')
            ->add('nombre')
            ->add('numeroDoc')
            ->add('direccion')
            ->add('correo')
            ->add('telefono')
            ->add('estado')
            ->add('idTipo')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TblCliente::class,
        ]);
    }
}
