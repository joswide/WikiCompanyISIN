<?php
namespace Joswide\WikiCompanyISIN;

class Binding{
	public $type;
	public $value;
	
	public function __construct($type, $value){
		$this->type = $type;
		$this->value = $value;
	}
	
	public function getValue()
	{
		return $this->value;
	}
	
	public function __toString()
	{
		return $this->getValue();
	}
	
	static public function do($object){
		switch($object->type){
			case 'uri':
				return new Bindings\Uri($object->value);
				
				break;
			
			case 'literal':
				if (isset($object->{'xml:lang'})){
					return new Bindings\Literal($object->value, $object->{'xml:lang'});
				}
				
				break;
		}
		
		return null;
	}
}