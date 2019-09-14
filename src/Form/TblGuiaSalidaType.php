<?php

namespace App\Form;

use App\Entity\TblGuiaSalida;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TblGuiaSalidaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numSerie')
            ->add('numeracion')
            ->add('fechaSalida')
            ->add('fechaLlegada')
            ->add('transportista')
            ->add('licencia')
            ->add('cantidad')
            ->add('puntoLlegada')
            ->add('idAtendido')
            ->add('estado')
            ->add('idEmpresaTransporte')
            ->add('idUnidadTransporte')
            ->add('idCliente')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TblGuiaSalida::class,
        ]);
    }
}
