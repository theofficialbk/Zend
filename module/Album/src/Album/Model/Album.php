<?php
/**
 * Created by PhpStorm.
 * User: bilal.khalid
 * Date: 21/10/14
 * Time: 16:13
 */

namespace Album\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Album
{
    public $id;
    public $artist;
    public $title;


    public function exchangeArray($data)
    {
        $this->id=(!empty($data['id']))?$data['id']:null;
        $this->artist=(!empty($data['artist']))?$data['artist']:null;
        $this->title=(!empty($data['title']))?$data['title']:null;
    }

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    public function getInputFilter()
    {

        if(!$this->inputFilter()){
            $inputFilter = new InputFilter();

            $inputFilter->add(array(
                'name'=>'id',
                'required'=>true,
                'filters'=>array(
                    array('name' => 'Int'),
                ),
            ));

            $inputFilter->add(array(
                'name'=>'partner',
                'required'=>true,
                'filters'=>array(
                    array('name'=>'StripTags'),
                    array('name'=>'StringTrim'),
                ),
                'validators'=>array(
                    array(
                        'name'=>'StringLength',
                        'option'=>array(
                            'encoding'=>'UTF-8',
                            'min'=>1,
                            'max'=>100,
                        ),
                    ),
                ),
            ));

            $inputFilter->add(array(
                'name'=>'title',
                'required'=>true,
                'filters'=>array(
                    array('name'=>'StripTags'),
                    array('name'=>'StringTrim'),
                ),
                'validators'=>array(
                    array(
                        'name'=>'StringLength',
                        'option'=>array(
                            'encoding'=>'UTF-8',
                            'min'=>1,
                            'max'=>100,
                        ),
                    ),
                ),
            ));
$this->inputFilter = $inputFilter;

        }

        return $this->inputFilter;
    }


}
