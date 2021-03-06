<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\FileType as FileTypeSymfony;

class ImportUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('document', FileTypeSymfony::class, [
                "mapped" => false,
                "label" => "Veuillez choisir un fichier",
                'attr'=>['class'=>'zone-upload']
            ])
        ;
    }
}
