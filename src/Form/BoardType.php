<?php

namespace App\Form;

use App\Entity\Board;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class BoardType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('homeTeam', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('awayTeam', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('homeScore', IntegerType::class, array('required' => false, 'attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('awayScore', IntegerType::class, array('required' => false, 'attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('Finished', CheckboxType::class, array('required' => false))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Board::class,
        ]);
    }
}
