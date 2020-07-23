<?php

namespace App\Form;

use App\Entity\Act;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class ActType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('duration')
            ->add('pictureFile', VichFileType::class, [
                'required' => false,
                'allow_delete' => false, // True to display a delete checkbox
                'download_uri' => false, // True to display a link of the picture
                'label' => "Image",
                'attr' => ['placeholder' => 'Add an image']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Act::class,
        ]);
    }
}
