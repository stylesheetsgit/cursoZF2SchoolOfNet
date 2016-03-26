<?php

namespace LivrariaAdmin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\ArrayAdapter;

/**
 * Description of Categorias
 *
 * @author Fernando
 */
class CategoriasController extends AbstractActionController {
    
    /**
     *
     * @var EntityManager 
     */
    protected $entityManager;
    
    public function indexAction() {
        
        $page = $this->params()->fromRoute('page');
        
        $categorias = $this->getEntityManager()
                ->getRepository('Livraria\Entity\Categoria')
                ->findAll();
                
        $paginator = new Paginator(new ArrayAdapter($categorias));
        $paginator->setCurrentPageNumber($page);
        $paginator->setDefaultItemCountPerPage(1);
        
        $view = array(
            'categorias' => $paginator,
            'page' => $page
        );
        
        return new ViewModel($view);
        
    }
    
    /**
     * @return EntityManager 
     */
    protected function getEntityManager() {
        if (null === $this->entityManager) {
            $this->entityManager = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager");
        }
        return $this->entityManager;
    }
    
}
