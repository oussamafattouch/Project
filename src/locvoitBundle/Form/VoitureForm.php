<?php


namespace locvoitBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;

class VoitureForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('disponiblite',TextareaType::class)
            ->add('prix',TextareaType::class);

    }
    public function getName()
    {
        return 'Voiture';
    }


}