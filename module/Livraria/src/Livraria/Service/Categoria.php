<?php

namespace Livraria\Service;

use Doctrine\ORM\EntityManager;

/**
 * Description of Categoria
 *
 * @author Fernando
 */
class Categoria extends AbstractService {
    
    /**
     * @var EntityManager
     */
    protected $entityManager;
    
    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
        $this->entity = "Livraria\Entity\Categoria";
    }
        
}
