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
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

final class ArticleAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper

        ->with('Content', ['class' => 'col-md-9'])
            ->add('title', TextType::class)
            ->add('content', CKEditorType::class)
        ->end()

        ->with('Image', ['class' => 'col-md-3'])
            ->add('image', TextType::class)
        ->end()

        ->with('Meta data', ['class' => 'col-md-3'])
            ->add('category', ModelType::class, [
                'class' => Category::class,
                'property' => 'title',
            ])
        ->end()
        
        ->add('createdAt', null, [
            'format' => 'Y-m-d H:i',
        ])
 
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('content');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->add('content')
            ->add('image', TextType::class)
            ->add('category.title')
            ;
    }

}