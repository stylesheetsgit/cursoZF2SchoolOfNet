<?php

namespace LivrariaAdmin\Form;

use Zend\Form\Form;

/**
 * Description of Categoria
 *
 * @author Fernando
 */
class Categoria extends Form {
    
    public function __construct($name = null, $options = array()) {
        parent::__construct("categoria", $options);
        
        $this->setAttribute('method', 'post');
        $this->setInputFilter(new CategoriaFilter);        
        
        // id
        $this->add(array(
           'name' => 'id',
            'attributes' => array(
                'type' => 'hidden'
            )            
        ));
        
        // nome
        $this->add(array(
           'name' => 'nome',
            'options' => array(
                'type' => 'text',
                'label' => 'Nome'
            ),
            'attributes' => array(
                'id' => 'nome',
                'class' => 'form-control',
                'placeholder' => 'Entre com o nome'
            )
        ));
        
        // submit
        $this->add(array(
           'name' => 'submit',
            'type' => 'Zend\Form\Element\Submit',
            'attributes' => array(
                'value' => 'Salvar',
                'class' => 'btn btn-success'
            )              
        ));
        
    }
}
