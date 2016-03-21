<?php

namespace Livraria\Model;

/**
 * Description of CategoriaService
 *
 * @author Fernando
 */
class CategoriaService {
    
    /**
     * @var Livraria\Model\CategoraiTable 
     */
    protected $categoriaTable;
    
    public function __construct(CategoriaTable $table) {
        $this->categoriaTable  = $table;
    }
    
    public function fetchAll() {
        $resultSet = $this->categoriaTable->select();
        return $resultSet;
    }
    
}
