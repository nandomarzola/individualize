<?php

/*
* Essa classe possui todas as consultas feitas no banco de dados
*/

class Consultas{

	protected $db;

	function __construct($conexao){
		$this->db = $conexao;
	}

	/* $this->db->prepare("SELECT * blabla"); */

	function getResult($table, $where=''){
		$select = $this->db->prepare("SELECT * FROM $table $where");
		$select->execute();
		$row = $select->fetch();
		return $row;
	}

	function getResults($table, $join = '', $where='' ){
		$select = $this->db->prepare("SELECT * FROM $table $join $where");
		$select->execute();
		$row = $select->fetchAll();
		return $row;
	}
}

?>