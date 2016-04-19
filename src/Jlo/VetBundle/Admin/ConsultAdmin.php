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
                ->add('date', 'sonata_type_datetime_picker', array( 'datepicker_use_button' => true,
                                                                    'dp_language' => 'es',
                                                                    'dp_use_current' => false,
                                                                    'format' => 'dd/MM/yyyy HH:mm',
                                                                    'attr' => array(
                                                                    'data-date-format' => 'dd/MM/yyyy HH:mm',
                                                                        'style'=> 'width:10em'
                                                                    )))
                /*->add('pet', 'sonata_type_model_autocomplete', array(   'required' => true,
                                                                        'property'=>'name',
                                                                        'placeholder' => 'Ingrese un paciente',
                                                                        'attr' => array('class' => 'form-control'),
                                                                        ))*/
            ->end()
            
            ->with('  ', array('class' => 'col-md-12'))
                ->add('cause', null, array('required' => false, 'attr' => array('rows' => 4)))
                ->add('diagnosis', null, array('required' => false, 'attr' => array('rows' => 4)))
                ->add('treatment', null, array('required' => false, 'attr' => array('rows' => 4)))
            ->end()
                
            ->with('Vacunas', array('class' => 'col-md-6'))
                ->add('vaccines', 'sonata_type_model', array(   'expanded' => false, 
                                                                'label' => 'Vacunas aplicadas',
                                                                'multiple' => true,
                                                                'btn_add' => 'Nueva vacuna'),array(
                                                                ))
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
            ->addIdentifier('date')
            ->add('pet')
            ->add('diagnosis')
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
    
    protected $datagridValues = array(
        '_page' => 1,            
        '_sort_order' => 'DESC', 
        '_sort_by' => 'date'  
    );
    
    public function getNewInstance()
    {
        $instance = parent::getNewInstance();
        $instance->setDate(new \DateTime());

        return $instance;
    }
}