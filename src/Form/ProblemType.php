<?php

namespace App\Form;

use App\Entity\Problem;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProblemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',null,[
                'label'=>'Titre'
            ])
            ->add('compagnie')
            ->add('start_at',null,[
                'label'=>'Date de debut du probleme'
            ])
            ->add('image')
            ->add('zone')
            ->add('description')
            ->add("Plaider",SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Problem::class,
        ]);
    }
}
