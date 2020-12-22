<?php


namespace locvoitBundle\Form;


use Doctrine\DBAL\Types\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;

class LocationForm extends AbstractType
{public function buildForm(FormBuilderInterface $builder, array $options)
{
    $builder
        ->add('duree',TextareaType::class)
        ->add('datedebut',TextareaType::class)
        ->add('datefin',TextareaType::class)
        ->add('id',TextareaType::class)
        ->add('mat',TextareaType::class);
}
    public function getName()
    {
        return 'Location';
    }

}