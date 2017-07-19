<?php
namespace Joswide\WikiCompanyISIN\Bindings;

class Uri extends \Joswide\WikiCompanyISIN\Binding{
	
	public function __construct($value)
	{
		parent::__construct('uri', $value);
	}
	
	public function getUri()
	{
		return $this->value;
	}
	
	public function getEntityId()
	{
		// http://www.wikidata.org/entity/Q152051
		if (strpos($this->value, 'http://www.wikidata.org/entity/') === 0){
			
			return substr($this->value, strlen('http://www.wikidata.org/entity/'));
		}
		
		return null;
	}
	
	public function __toString()
	{
		return $this->getEntityId();
	}
}