<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ProjectAdmin extends Admin
{
    protected $baseRouteName = 'project';
    protected $baseRoutePattern = 'project';

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('position')
            ->add('title')
            ->add('picture')
            ->add('locale')
            ->add('description')
        ;
    }


    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('locale')
        ;
    }


    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->add('locale')
            ->add('position')
        ;
    }
}