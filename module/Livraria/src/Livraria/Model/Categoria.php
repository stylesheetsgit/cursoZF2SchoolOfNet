<?php

namespace Livraria\Model;

/**
 * Description of Categoria
 *
 * @author Fernando
 */
class Categoria {
    
    public $id;
    public $nome;
    
    public function exchangeArray($data) {
        $this->id = isset($data['id']) ? $data['id'] : null;
        $this->nome = isset($data['nome']) ? $data['nome'] : null;
    }
    
}
