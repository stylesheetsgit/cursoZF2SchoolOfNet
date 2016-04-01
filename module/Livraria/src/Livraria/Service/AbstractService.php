<?php

namespace Livraria\Service;

use Doctrine\ORM\EntityManager;
use Livraria\Entity\Configurator;

/**
 * Description of AbstractService
 *
 * @author Fernando
 */
class AbstractService {
    /**
     * @var EntityManager
     */
    protected $entityManager;    
    
    /**
     *
     * @var type 
     */
    protected $entity;

    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }
    
    /**
     * 
     * @param array $data
     * @return CategoriaService
     */
    public function insert(array $data) {
        $entity = $this->entity($data);
        
        $this->entityManager->persist($entity);
        $this->entityManager->flush();
        return $entity;        
    }
    
    /**
     * 
     * @param array $data
     * @return type
     */
    public function update(array $data) {
        $reference = $this->entityManager->getReference($this->entity, $data['id']);
        $entity = Configurator::configure($reference, $data);
        
        $this->entityManager->persist($entity);
        $this->entityManager->flush();
        return $entity;        
    }
    
    /**
     * 
     * @param type $id
     * @return type
     */
    public function delete($id) {
        $entity = $this->entityManager->getReference($this->entity, $id);
        
        if ($entity) {
            $this->entityManager->remove($entity);
            $this->entityManager->flush();
            return $id;
        }
    }
}
