<?php

namespace Livraria\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $entityManager = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager");
        $repository = $entityManager->getRepository('Livraria\Entity\Categoria');
        
        $Categorias = $repository->findAll();
        
        $view = array(
           'categorias' => $Categorias
        );
        
        return new ViewModel($view);
    }
}
