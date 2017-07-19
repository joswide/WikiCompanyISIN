<?php
namespace Joswide\WikiCompanyISIN\Bindings;

class Literal extends \Joswide\WikiCompanyISIN\Binding{
	public $lang;
	
	public function __construct($value, $lang){
		parent::__construct('literal', $value);
		
		$this->lang = $lang;
	}
	
	public function getLang()
	{
		return $this->lang;
	}
}