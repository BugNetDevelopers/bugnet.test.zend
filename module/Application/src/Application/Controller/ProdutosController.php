<?php

namespace Application\Controller;

use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;
use Application\Form\ProdutoForm;

class ProdutosController extends AbstractActionController
{
	public function indexAction(){
		return new ViewModel();
	}
	public function novoAction(){
		$form = new ProdutoForm();
		
		$request = $this->getRequest();
		if($request->isPost()){
			$data = $request->getPost();
			var_dump($data);
		}
		
		$view = new ViewModel(array(
			'form' => $form
		));
		$view->setTemplate('application/produtos/form.phtml');
		return $view;
	}
}
