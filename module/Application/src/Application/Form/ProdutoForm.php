<?php

namespace Application\Form;

use Zend\Form\Form;
use Zend\Form\Element\Hidden;
use Zend\Form\Element\Text;
use Zend\Form\Element\File;
use Zend\Form\Element\Textarea;
use Zend\Form\Element\Checkbox;
use Zend\Form\Element\Button;

class ProdutoForm extends Form{
	public function __construct(){
		parent::__construct('produto');
		$id = new Hidden('id');
		$nome = new Text('nome');
		$nome ->setLabel('Nome:')
			->setAttributes(array(
				//'style'=>'width:150px;'
				'class'=>'form-control',
				'placeholder'=>'adicione o nome do seu produto'
			));
		$preco = new Text('preco');
		$preco->setLabel('Preco:')
			->setAttributes(array(
				//'style' => 'width:60px;',
				'class'=>'form-control',
				'placeholder'=>'digite o valor em reais',
				'type'	=> 'number'	,
					'step'=>"0.01"
			));
		$foto = new File('foto');
		$foto->setLabel('Selecione uma imagem:')
			->setAttributes(array(
				'style' => 'width:60px;'				
			));
		$descricao = new Textarea('descricao');
		$descricao->setLabel('Adicione uma descrição:')
			->setAttributes(array(
				//'style' => 'width:150px;height:100px;'
				'class'=>'form-control',
				'row' => 3
			));
		$status = new Checkbox('status');
		$status->setLabel('Status:')
			->setValue(1);
		$submit = new Button('salvar');
		$submit->setLabel('Cadastrar')
			->setAttributes(array(
				'type' => 'submit'				
			));
		$this->add($id);
		$this->add($nome);
		$this->add($preco);
		$this->add($foto);
		$this->add($descricao);
		$this->add($status);
		$this->add($submit);
			
	}
}