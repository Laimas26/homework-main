<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Enter title'
                    ]
            ])
            ->add('text', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Enter text',
                    'rows' => '15'
                    ]
            ])
            ->add('image', FileType::class, array(
                'required' => false,
                'mapped' => false,
                'attr' => [
                    'class' => 'form-control '
                ]
            ))
            // ->add('imageFromUrl', TextType::class, array(
            //     'attr' => [
            //         'class' => 'form-control '
            //     ]
            // ))
            ->add('save', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary'
                    ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
