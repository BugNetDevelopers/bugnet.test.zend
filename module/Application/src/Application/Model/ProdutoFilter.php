<?php

namespace Application\Model;

use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory;
use Zend\Form\Annotation\Validator;
class ProdutoFilter implements InputFilterAwareInterface
{
	public $id;
	public $nome;
	public $preco;
	public $foto;
	public $descricao;
	public $status;
	
	protected $inputFilter;
	
	public function exchangeArray($data){
		$this->id = self::getField($data, 'id');
		$this->nome = self::getField($data, 'nome');
		$this->preco = self::getField($data, 'preco');
		$this->foto = self::getField($data, 'foto');
		$this->descricao = self::getField($data, 'descricao');
		$this->status = self::getField($data, 'status');
	}
	
	private static function getField($data, $fieldName){
		return (isset($data[$fieldName]))? $data[$fieldName] : null;
	}
	
	public function getArrayCopy(){
		return get_object_vars($this);
	}
	public function setInputFilter(InputFilterInterface  $inputFilter){
		throw new \Exception("Not Used");
	}
	
	public function getInputFilter(){
		if(!$this->inputFilter){
			$inputFilter = new InputFilter();
			$factory = new Factory();
			
			$inputFilter->add($factory->createInput(array(
				'name'=> 'id',
				'required'=>true,
				'filters' => array(
					'name' => 'Int'
				)
			)));
			$inputFilter->add($factory->createInput(array(
					'name'=> 'nome',
					'required'=>true,
					'filters' => array(
							array('name'=>'StringTags'),
							array('name'=>'StringTrim')
					),
					'validators' => array(
						array(
							'name' => 'NotEmpty',
							'options'=> array(
								'messages' => array(
									'IsEmpty'=>'Favor digitar corretamente o campo nome'
								)
							)
						)
					)
			)));
			$inputFilter->add($factory->createInput(array(
					'name'=> 'preco',
					'required'=>true,
					'filters' => array(
							array('name'=>'StringTags'),
							array('name'=>'StringTrim')
					)
			)));
			$inputFilter->add($factory->createInput(array(
					'name'=> 'foto',
					'required'=>true,
					'filters' => array(
							array('name'=>'StringTags'),
							array('name'=>'StringTrim')
					)
			)));
			$inputFilter->add($factory->createInput(array(
					'name'=> 'descricao',
					'required'=>true,
					'filters' => array(
							array('name'=>'StringTags'),
							array('name'=>'StringTrim')
					),
					'validators' => array(
							array(
								'name' => 'NotEmpty',
								'options'=> array(
									'messages' => array(
										'IsEmpty'=>'Favor adicionar uma descrição'
									)
								)
							),
							array(
									'name' => 'StringLength',
									true,
									'options'=> array(
											'encoding'=> 'UTF-8',
											'min'=>10,
											'max'=>500,
											'messages' => 'A descrição dever estar entre 10 e 500 caracteres'
									)
							)
					)
			)));
			$this->inputFilter = $inputFilter;
		}
		return $inputFilter;
	}
	
}
