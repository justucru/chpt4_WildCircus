<?php

namespace App\Form;

use App\Entity\Act;
use App\Entity\Performer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class PerformerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('nationality')
            ->add('picture', FileType::class, [
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'application/jpg',
                            'application/png',
                        ],
                        'mimeTypesMessage' => 'Please upload an image in JPG, JPEG or PNG format',
                    ])
                ]
            ])
            ->add('biography')
            ->add('acts', EntityType::class, [
                'label' => 'Program',
                'class' => Act::class,
                'choice_label' => function (Act $act) {
                    return $act->getId() . ' - ' . $act->getName();
                },
                'expanded' => true,
                'multiple' => true,
                'by_reference'=> false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Performer::class,
        ]);
    }
}
