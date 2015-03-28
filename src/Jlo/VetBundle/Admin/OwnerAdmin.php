<?php
// src/Jlo/VetBundle/Admin/OwnerAdmin.php

namespace Jlo\VetBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

use Knp\Menu\ItemInterface as MenuItemInterface;

use Jlo\VetBundle\Entity\Owner;

class OwnerAdmin extends Admin
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
            ->add('lastname')
            ->add('email')
            ->add('address')
            ->add('phone')
            ->add('cellphone')
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
            ->with('Datos', array('class'=>'col-md-4'))
                ->add('name')
                ->add('lastname')
                ->add('email', null, array('required' => false))                
                
            ->end()
            ->with('Localización', array('class'=>'col-md-4'))
                ->add('address')
                ->add('city')
            ->end()
            ->with('Contacto', array('class'=>'col-md-4'))    
                ->add('phone_primary')
                ->add('phone_secondary')
                ->add('phone_other')
            ->end()
             
            /*->with('Mascotas', array('class'=>'col-md-12'))
                ->add('pets', 'sonata_type_collection', array(
                'type_options' => array(
                    // Prevents the "Delete" option from being displayed
                    'delete' => false,
                    'read_only' => true,
                    'label' => 'xxx',
                    'delete_options' => array(
                        // You may otherwise choose to put the field but hide it
                        'type'         => 'hidden',
                        // In that case, you need to fill in the options as well
                        'type_options' => array(
                            'mapped'   => false,
                            'required' => false,
                        )
                    )
                )
            ), array(
                'edit' => 'inline',
                'inline' => 'table',
                'sortable' => 'position',
            ))*/
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
            ->addIdentifier('lastname')
            ->add('name')
            ->add('address')
            ->add('phone_primary')
            
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
            ->add('lastname')
            ->add('name')
            ->add('phone_primary')
            ->add('address')
            /*->add('tags', null, array('field_options' => array('expanded' => true, 'multiple' => true)))*/
        ;
    }
    

}