<?php

namespace App\Form;

use App\Entity\TblUsuario;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TblUsuarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codigo')
            ->add('nombres')
            ->add('apellidos')
            ->add('usuario')
            ->add('password')
            ->add('correo')
            ->add('foto')
            ->add('estado')
            ->add('idCargo')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TblUsuario::class,
        ]);
    }
}
