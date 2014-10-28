<?php
/**
 * Created by PhpStorm.
 * User: bilal.khalid
 * Date: 23/10/14
 * Time: 11:35
 */

namespace Album\Form;

use Zend\Form\Form;


class AlbumForm extends Form
{

    public function __construct($name = null)
    {

       parent::__construct('album');

        $this->add(array(
            'name'=>'id',
            'type'=>'Hidden'
        ));
        $this->add(array(
            'name'=>'title',
            'type'=>'Text',
            'options'=>array(
                'label'=>'title',
            ),
        ));
        $this->add(array(
            'name'=>'partner',
            'type'=>'Text',
            'options'=>array(
                'label'=>'partner',
            ),
        ));
        $this->add(array(
            'name'=>'submit',
            'type'=>'Submit',
            'attributes'=>array(
                'value'=>'Submit',
                'id'=>'submitBtn',
            ),
        ));




    }

} 