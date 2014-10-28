<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Form\NexmoForm;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $app = new NexmoForm();

      //  return $view;
        $data=array(1=>'firstname',2=>'lastname');
        $viewModel= new ViewModel(array('app'=>$app));
        //$viewModel->setTemplate('application/nexmo/nexmo');
        if ($_POST)
        {




        }
        return $viewModel;
    }
    public function submitAction()
    {

   // die("Singned");


    }

    protected function fetchData(array $data)
    {
        $sm = $this->getServiceLocator();
        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
        $resultSetPro = new \Zend\Db\ResultSet\ResultSet();
        $resultSetPro->setArrayObjectPrototype(new \Application\Model\Nexmo);
      //  $tableGateway = new \Zend\Db\TableGateway\Table
    }



}
