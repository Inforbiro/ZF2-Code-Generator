<?php

namespace Codegenerator\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Codegenerator\Form\CodegeneratorForm;
use Codegenerator\Validator\CodegeneratorFormValidator;
use Codegenerator\Helper\CodegeneratorHelper;

class CodegeneratorController extends AbstractActionController
{
	public function indexAction()
	{
		/*$form = new CodegeneratorForm();

		$form->get('submit')->setAttribute('value', 'Create');

		return array('form' => $form);*/
		
		return new ViewModel();
	}
	
	public function createmoduleAction()
	{
		//$messages = '';
		
		// Get success from URL query ('1' = module created, '0' = module not created)
		$success = $this->getRequest()->getQuery('success', '0');
		//echo "Success: ".$success;
		
		// Create form
		$form = new CodegeneratorForm();
		$form->get('submit')->setAttribute('value', 'Create');
		
		//return array('success'=>$success, 'form' => $form); // Test purpose
		
		// Generate new module
		if($success != '1') {
			$request = $this->getRequest();
			if ($request->isPost()) {
				$formValidator = new CodegeneratorFormValidator();
				$form->setInputFilter($formValidator->getInputFilter());
				$form->setData($request->getPost());
				if($form->isValid()) {
					$module = $request->getPost()->get('module');
					if ($module != '') {
						// First letter to uppercase, e.g. moDULe becomes Module
						$module = ucfirst(strtolower($module));
						if(is_dir('module/'.$module)) {
							$success = 2; // Module already exists
						} else {
							$helper = new CodegeneratorHelper();
							$helper->createModule($module);
							$success = 1; // Success
							//return $this->redirect()->toUrl('index?success=1'); // Success
						}
					}
				} else {
					//$messages = $form->getMessages();
				}
				
				
			}
		}
		
		// Return variables to view
		return new ViewModel(array('success'=>$success, 'form' => $form));
	}
}
