<?php
// src/Jlo/VetBundle/Admin/ConsultAdmin.php

namespace Jlo\VetBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

use Knp\Menu\ItemInterface as MenuItemInterface;

use Jlo\VetBundle\Entity\Consult;

class ConsultAdmin extends Admin
{
    /**
     * @param \Sonata\AdminBundle\Show\ShowMapper $showMapper
     *
     * @return void
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('date')
            ->add('cause')
            ->add('diagnosis')
            ->add('treatment')
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
            ->with(' ', array('class' => 'col-md-6'))
                ->add('date', 'sonata_type_date_picker')
                ->add('pet', 'sonata_type_model_autocomplete', array(   'required' => true,
                                                                        'property'=>'name',
                                                                        'placeholder' => 'Ingrese un paciente',
                                                                        'attr' => array('class' => 'form-control'),
                                                                        ))
            ->end()
            ->with('  ', array('class' => 'col-md-6'))
                ->add('cause', null, array('required' => false))
                ->add('diagnosis', null, array('required' => false))
                ->add('treatment', null, array('required' => false))
            ->end()
         
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
            ->add('date')
            ->add('pet')
            
            ->add('_action', 'actions', array(
                'actions' => array(
                    //'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                    //'history' => array()
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
            ->add('date')
            ->add('pet')
        ;
    }
}