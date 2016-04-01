<?php

namespace LivrariaAdmin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\ArrayAdapter;

use LivrariaAdmin\Form\Categoria as FrmCategoria;

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
        $paginator->setDefaultItemCountPerPage(10);
        
        $view = array(
            'categorias' => $paginator,
            'page' => $page
        );
        
        return new ViewModel($view);
        
    }
    
    /**
     * Nova categoria
     */
    public function newAction() {
        $form = new FrmCategoria();
        
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                
                // inserir dados
                $service = $this->getServiceLocator()->get('Livraria\Service\Categoria');
                $service->insert($request->getPost()->toArray());
                
                // redirect
                return $this->redirect()->toRoute('livraria-admin', array(
                    'controller' => 'categorias'
                ));
                
            }
        }
        
        $view = array(
            'form' => $form
        );
        
        return new ViewModel($view);
    }

    /**
     * 
     * @return ViewModel
     */
    public function editAction() {
        
        $form = new FrmCategoria();
        $request = $this->getRequest();
        
        $id = $this->params()->fromRoute('id', 0);
        
        $repository = $this->getEntityManager()->getRepository('Livraria\Entity\Categoria');
        $entity = $repository->find($id);
        
        if ($id) {
            $form->setData($entity->toArray());
        }
        
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $service = $this->getServiceLocator()->get('Livraria\Service\Categoria');
                $service->update($request->getPost()->toArray());
                
                // redirect
                return $this->redirect()->toRoute('livraria-admin', array(
                    'controller' => 'categorias'
                ));
            }
        }    
        
        $view = array(
            'form' => $form
        );
        
        return new ViewModel($view);
        
    }
    
    public function deleteAction() {
        $service = $this->getServiceLocator()->get('Livraria\Service\Categoria');
        
        if ($service->delete($this->params()->fromRoute('id', 0))) {
            // redirect
            return $this->redirect()->toRoute('livraria-admin', array(
                'controller' => 'categorias'
            ));
        } 
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
