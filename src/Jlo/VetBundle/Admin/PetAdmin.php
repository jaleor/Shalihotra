<?php
// src/Jlo/VetBundle/Admin/PetAdmin.php

namespace Jlo\VetBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

use Knp\Menu\ItemInterface as MenuItemInterface;

use Jlo\VetBundle\Entity\Pet;

class PetAdmin extends Admin
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
            ->add('specie')
            ->add('breed')
            ->add('owner')
        ;
    }

    /**
     * @param \Sonata\AdminBundle\Form\FormMapper $formMapper
     *
     * @return void
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $subject = $this->getSubject();
        
        $formMapper
            ->with('General', array('class'=>'col-md-6'))
                ->add('name')
                ->add('specie')
                ->add('breed', 'sonata_type_model_autocomplete', array('property' => 'name',
                                                                        'placeholder' => 'Raza sin especificar',
                                                                        'attr' => array('class' => 'form-control', 'data-sonata-select2-allow-clear'=>'true')
                                                                        ))
                /*->add('owner', 'sonata_type_model_autocomplete', array( 'property'=>'name',
                                                                        'placeholder' => 'Ingrese un dueño',
                                                                        'attr' => array('class' => 'form-control'),
                                                                        ))*/
                /*->add('owner', 'sonata_type_admin', array('delete' => false))*/
                ->add('owner', 'sonata_type_model_list',    array(),
                                                            array('placeholder' => 'Seleccione el dueño'))
                ->add('notes')
                ->add('vaccines', 'text', array('required' => false,
                                                'disabled' => true))
            ->end()
                
            ->with('Características', array(    'class'=>'col-md-6',                                
                                                ))
                ->add('birthdate', 'sonata_type_date_picker', array('required' => false,
                                                                    'dp_language' => 'es',
                                                                    'dp_use_current' => false,
                                                                    'format' => 'dd/MM/yyyy',
                                                                    //'read_only' => true,
                                                                    'widget' => 'single_text',
                                                                    'datepicker_use_button' => false,
                                                                    'attr' => array(
                                                                    'class' => 'col-xs-4',
                                                                    'placeholder' => 'Desconocida',
                                                                    'data-date-format' => 'dd/MM/yyyy',
                                                                    )));
        
        if ($subject->getId() && $subject->getBirthdate()) {
            $formMapper
                ->add('age', 'text', array('disabled' => true, 'required' => false, 'attr' => array('class' => 'col-xs-4')));
        }
        
        $formMapper
                ->add('gender', 'choice', array('choices' => array( 'Unknown' => 'Desconocido',
                                                                     'Male' => 'Male',
                                                                     'Female' => 'Female'),
                                                'expanded' => true))
                ->add('castrated', null, array('required' => false))
                ->add('dead', null, array('required' => false))
                ->add('color', null, array('required' => false))
            ->end()
        ;
        
        

        if ($subject->getId()) {
            $formMapper
                    
            /*->with('Vacunas Aplicadas', array('class' => 'col-md-12'))    
                ->add('vaccines', 'text', array('read_only' => true, 'label' => false))
            ->end()*/
                
            ->with('Historia Clínica', array(   'class'=>'col-md-12',
                                                'box_class'   => 'box box-solid box-success'))
                ->add('consults', 'sonata_type_collection', array(
                'required' => false,
                'by_reference' => false,
                'label' => false,
                
                'type_options' => array(
                    // Prevents the "Delete" option from being displayed
                    'delete' => false,
                    //'read_only' => true,
                    'btn_add' => 'Nueva consulta',
                    'label' => false,
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
                //'link_parameters'   => array('context' => $context),
                'admin_code'        => 'jlo.vet.admin.consult',
            ))
            
            ->end()
            ->with('Archivos', array('collapsed' => true,'class'=>'col-md-12'))
            ->end()
        ;
        }
        
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
            ->add('breed')
            ->add('owner')
            
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
            ->add('owner.name')
            ->add('owner.lastname')
            ->add('owner.address')
            ->add('owner.phone_1')
            /*->add('tags', null, array('field_options' => array('expanded' => true, 'multiple' => true)))*/
        ;
    }
    
    public function prePersist($pet) {
        foreach ($pet->getConsults() as $consult) {
            $consult->setPet($pet);
        }
    }

    public function preUpdate($pet) {
        foreach ($pet->getConsults() as $consult) {
            $consult->setPet($pet);
        }
        //$pet->setConsults($pet->getConsults());
    }

}