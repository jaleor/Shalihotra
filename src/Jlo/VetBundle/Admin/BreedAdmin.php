<?php
// src/Jlo/VetBundle/Admin/BreedAdmin.php

namespace Jlo\VetBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

use Knp\Menu\ItemInterface as MenuItemInterface;

use Jlo\VetBundle\Entity\Breed;

class BreedAdmin extends Admin
{
    /**
     * @param \Sonata\AdminBundle\Show\ShowMapper $showMapper
     *
     * @return void
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name')
            ->add('name_origin')
            ->add('specie')
        ;
    }

    /**
     * @param \Sonata\AdminBundle\Form\FormMapper $formMapper
     *
     * @return void
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with(' ', array('class'=>'col-md-6'))
                ->add('name')
                ->add('name_origin')
                ->add('specie', 'sonata_type_model')                
            ->end()
            /*->with('Tags')
                ->add('tags', 'sonata_type_model', array('expanded' => true, 'multiple' => true))
            ->end()
            ->with('Comments')
                ->add('comments', 'sonata_type_model', array('multiple' => true))
            ->end()
            ->with('System Information', array('collapsed' => true))
                ->add('created_at')
            ->end()*/
        ;
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\ListMapper $listMapper
     *
     * @return void
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('specie')
            
            ->add('_action', 'actions', array(
                'actions' => array(
                    //'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\DatagridMapper $datagridMapper
     *
     * @return void
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('specie')    
            /*->add('tags', null, array('field_options' => array('expanded' => true, 'multiple' => true)))*/
        ;
    }
}