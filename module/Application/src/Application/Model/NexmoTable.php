<?php
/**
 * Created by PhpStorm.
 * User: bilal.khalid
 * Date: 28/10/14
 * Time: 11:59
 */

namespace Application\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class NexmoTable
{
    protected $tableGateway;
    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function saveDate(){

    }


    public function getData($date1=false,$date2=false)
    {
        $rowset = $this->tableGateway->select('id',array('id'=>$date1));
        return $rowset;

    }
}
?>