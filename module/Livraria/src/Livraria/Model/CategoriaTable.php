<?php

namespace Livraria\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\AbstractTableGateway;

/**
 * Description of CategoriaTable
 *
 * @author Fernando
 */
class CategoriaTable extends AbstractTableGateway {
    
    protected $table = "categoria";
    
    public function __construct(Adapter $adapter) {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new Categoria);
        $this->initialize();
    }
    
}
