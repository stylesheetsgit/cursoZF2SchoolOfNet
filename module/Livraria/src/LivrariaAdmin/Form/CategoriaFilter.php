<?php

namespace LivrariaAdmin\Form;

use Zend\InputFilter\InputFilter;

/**
 * Description of CategoriaFilter
 *
 * @author Fernando
 */
class CategoriaFilter extends InputFilter {
    
    public function __construct() {
        $this->add(array(
            'name' => 'nome',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim')
            ),
            'validators' => array(
                array(
                    'name' => 'notEmpty', 
                    'options' => array('messages' => array('isEmpty' => 'Nome não pode estar em branco'))
                )
            )
        ));
    }
    
}
