<?php
namespace Joswide\WikiCompanyISIN;

class SparqlResultRow{
	protected $bindings;
	
	public function __construct($bindings, $vars){
		$this->bindings = $bindings;
	}
	
	static public function do($binding, $vars){
		$bindings = [];
		
		foreach($vars as $var_name){
			$bindingObject = Binding::do($binding->{$var_name});
			
			if ($bindingObject){
				
				$bindings[$var_name] = $bindingObject;
			}
			
			
		}
		
		
		return new self($bindings, $vars);
		
		$this->bindings = $bindings;
	}
	
	public function hasColumn($column_name){
		return (isset($this->bindings[$column_name]));
	}
	
	public function getColumn($column_name){
		if (! isset($this->bindings[$column_name]))
		{
			return null;
		}
		
		return $this->bindings[$column_name];
	}
	
	
}