<?php

namespace App\Form;

use App\Entity\Booking;
use App\Entity\Event;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('email', EmailType::class)
            ->add('nb_tickets', IntegerType::class, [
                'label' => 'Number of tickets',
            ])
            ->add('event',EntityType::class, [
        'label' => 'Event',
        'class' => Event::class,
        'choice_label' => 'city',
        'expanded' => true,
        'multiple' => false,
        'by_reference'=> false,
    ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Booking::class,
        ]);
    }
}
