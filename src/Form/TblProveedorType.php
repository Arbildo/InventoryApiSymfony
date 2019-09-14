<?php

namespace App\Form;

use App\Entity\TblProveedor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TblProveedorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codigo')
            ->add('nombre')
            ->add('ruc')
            ->add('telefono')
            ->add('celular')
            ->add('web')
            ->add('contacto')
            ->add('telefContacto')
            ->add('direccion')
            ->add('correo')
            ->add('estado')
            ->add('idTipo')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TblProveedor::class,
        ]);
    }
}
