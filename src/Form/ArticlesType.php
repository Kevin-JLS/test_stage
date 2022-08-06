<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ArticlesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre',
                'attr'  => [
                    'class' => 'input-form',
                    'placeholder' => 'Titre de l\'article'
                ]
            ])
            ->add('content', TextareaType::class, [
                'label' => 'Contenu',
                'attr'  => [
                    'class' => 'input-form',
                    'placeholder' => 'Contenu de l\'article'
                ]
            ])
            ->add('img', FileType::class, [
                'label' => 'Image de l\'article',
                'attr'  => [
                    'class' => 'file-input'
                ],
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '5000k',
                        'maxSizeMessage' => 'Votre fichier {{ name }} fait {{ size }} {{ suffix }} et la limite est de {{ limit }} {{ suffix }}.',
                        'mimeTypes' => [
                            'image/jpg',
                            'image/jpeg',
                            'image/png',
                            'image/gif',
                        ],
                        'mimeTypesMessage' => 'Veuillez sélectionner une image valide.',
                    ])
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Valider',
                'attr'  => [
                    'class' => 'btn btn-submit'
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
