<?php
/**
 * Created by PhpStorm.
 * User: bilal.khalid
 * Date: 28/10/14
 * Time: 11:55
 */
namespace Application\Model;

class Nexmo
{
    public $id;
    public $datepost;
    public function setDate($date)
    {
        $this->date = $date;
    }
    public function exchangeArray($array=false)
    {
        $this->date = (isset($array['default_widget']))?
        $array['default_widget']: null;

    }


}