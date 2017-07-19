<?php
namespace Joswide\WikiCompanyISIN;

class SparqlResult{
	public $rows;
	public $vars;
	
	public function __construct($object){
		$this->vars = $object->head->vars ?: [];

		$bindings = $object->results->bindings ?: [];
		
		$this->rows = [];
		
		foreach($object->results->bindings as $binding){
			
			if ($row = SparqlResultRow::do($binding, $this->vars)){
				$this->rows[] = $row;
			}
		}
		
	}
	
	public function filter(\Closure $function){
		$this->rows = array_filter($this->rows, $function);
	}
	
	public function getRows()
	{
		return $this->rows;
	}
	
	public function getFirstRow()
	{
		return current($this->rows);
	}
	
	public function getNumRows()
	{
		return count($this->rows);
	}
	
	public function getColumnNames()
	{
		return $this->vars;
	}
	
	
	static public function doFromJson($json){
		
		$object = json_decode($json);
		
		if (json_last_error() > 0){
			return null;
		}
		
		//jgdebug($object);
		
		return new self($object);
		
	}
}