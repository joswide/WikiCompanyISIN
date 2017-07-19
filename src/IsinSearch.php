<?php
namespace Joswide\WikiCompanyISIN;

class IsinSearch{
	
	// isin
	public $isin;
	
	
	public function __construct($isin){
		$this->isin = $isin;
	}
	
	/**
	 *	Return SPARQL query to find a public company by ISIN code
	 *
	 *
	 *	@return String
	 */
	public function getQuery(){
		
		$isin = $this->isin ;
		
		$query = '
PREFIX wikibase: <http://wikiba.se/ontology#>
PREFIX wd: <http://www.wikidata.org/entity/>
PREFIX wdt: <http://www.wikidata.org/prop/direct/>

SELECT ?item ?itemLabel WHERE {
  ?item wdt:P946 "' . $isin . '".
  
  SERVICE wikibase:label { bd:serviceParam wikibase:language "es, en, [AUTO_LANGUAGE]". }
}';

		

		return $query;
	}
	
	
	
	public function search(){
		$sparql = new Sparql();
		
		return $sparql->query( $this->getQuery() );
	}

}