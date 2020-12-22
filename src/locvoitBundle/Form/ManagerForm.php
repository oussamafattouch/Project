<?php


namespace locvoitBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;

class ManagerForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom',TextareaType::class)
            ->add('Prenom',TextareaType::class);

    }
    public function getName()
    {
        return 'Manager';
    }

}