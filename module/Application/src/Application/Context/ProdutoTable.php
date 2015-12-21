<?php

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
class ProdutoTable extends AbstractTableGateway{
	protected $tableName = "tbProdutos";
	
	public function __construct(Adapter $adapter){
		$this->adapter = $adapter;
		$this->resultSetPrototype = new ResultSet();
	}
}