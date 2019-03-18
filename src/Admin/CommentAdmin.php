<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Category;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Form\Type\Filter\DateTimeType;
use App\Entity\Article;

final class CommentAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper

        ->with('Content', ['class' => 'col-md-9'])
            ->add('author', TextType::class)
            ->add('content', TextareaType::class)
        ->end()

        ->with('Meta data', ['class' => 'col-md-3'])
            ->add('article', ModelType::class, [
                'class' => Article::class,
                'property' => 'title',
            ])
        ->end()
        ->add('createdAt', null, [
            'format' => 'Y-m-d H:i',
        ])
 
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('author')->add('content');
    }

}