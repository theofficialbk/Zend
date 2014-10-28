<?php
/**
 * Created by PhpStorm.
 * User: bilal.khalid
 * Date: 21/10/14
 * Time: 16:19
 */
namespace Album\Model;

use Zend\Db\TableGateway\TableGateway;

class AlbumTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
   $this->tableGateway=$tableGateway;

    }

    public function fetchAll()
    {
        $resultSet=$this->tableGateway->select();
        return $resultSet;
    }

    public function getAlbum($id)
    {
        $id=(int)$id;
        $rowset = $this->tableGateway->select(array('id'=>$id));
        $row = $rowset->current();
        if(!$row){
            throw new Exception("Couldnt find a row".$id);
        }
        return $row;
    }

    public function saveAlbum(Album $album)
    {
        $data=array(
            'partner'=>$album->partner,
            'description'=>$album->description,
        );

        $id= (int)$album->id;
        if ($id == 0){
            $this->tableGateway->insert($data);
        }else{
            if($this->getAlbum($id))
            {  $this->tableGateway->update($data,array('id'=>$id));
            }else{
                throw new Exception("Couldnt find a row");
            }
        }

    }

    public function deleteAlbum($id)
    {
        $this->tableGateway->delete(array('id'=>(int)$id));
    }


}