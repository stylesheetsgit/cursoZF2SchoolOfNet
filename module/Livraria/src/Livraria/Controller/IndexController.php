<?php

namespace Livraria\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $this->getServiceLocator()->get("Doctrine\ORM\Entity");
        
        $view = array(
           
        );
        
        return new ViewModel($view);
    }
}
