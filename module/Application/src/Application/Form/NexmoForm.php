<?php
/**
 * Created by PhpStorm.
 * User: bilal.khalid
 * Date: 27/10/14
 * Time: 14:11
 */
namespace Application\Form;
use Zend\Form\Form;
class NexmoForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('Nexmo');
        $this->setAttribute('method', 'post');
        $this->setAttribute(
            'enctype',
            'multipart/form- data'
        );
        $this->add(array(
            'name' => 'default_widget',

            'attributes' => array(
                'type' => 'text',
                'id'   => 'default_widget',
                'class' => 'mtz-monthpicker-widgetcontainer',
                'required' => 'required',
            ),
            'options' => array(
                'label' => 'Please choose the month of records you want to display:',
            ),
        ));

        $this->add(
            array(
                'name' => 'submit',
                'attributes' => array(
                    'type' => 'submit',
                    )
            )
        );


    }
}
