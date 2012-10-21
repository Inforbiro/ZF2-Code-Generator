<?php
namespace Codegenerator\Form;

use Zend\Form\Form;

class CodegeneratorForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('codegenerator');

        $this->setAttribute('method', 'post');
        
        $this->add(array(
            'name' => 'module',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Module name:',
		'required' => 'required',
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Create',
                'id' => 'submitbutton',
            ),
        ));
    }
}
