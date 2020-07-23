<?php

namespace App\Form;

use App\Entity\Act;
use App\Entity\Event;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('city')
            ->add('address')
            ->add('date')
            ->add('time')
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
            'data_class' => Event::class,
        ]);
    }
}
