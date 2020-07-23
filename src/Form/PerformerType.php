<?php

namespace App\Form;

use App\Entity\Act;
use App\Entity\Performer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class PerformerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('nationality')
            ->add('pictureFile', VichFileType::class, [
                'required' => false,
                'allow_delete' => false, // True to display a delete checkbox
                'download_uri' => false, // True to display a link of the picture
                'label' => "Image",
                'attr' => ['placeholder' => 'Add an image']
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
