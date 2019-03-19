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
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

final class CommentAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper

        ->with('Content', ['class' => 'col-md-9'])
            ->add('author', TextType::class)
            ->add('content', CKEditorType::class)
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
    
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('author')
            ->add('content');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('author')
            ->add('content')
            ->add('article.title')
            ;
    }

}