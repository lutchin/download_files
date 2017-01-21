<?php
namespace Images\ImageBundle\Form;

use Symfony\Component\Form\AbstractType;
use Images\ImageBundle\Entity\Upload;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class UpdateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ...
            ->add('imageFile', FileType::class, array('label' => 'Загрузите Файл (JPEG)'))
            ->add('save', SubmitType::class, array('label' => 'Отправить!'))
            // ...
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Upload::class,
        ));
    }
}