<?php

namespace Joswide\WikiCompanyISIN;

class Sparql{
	
	public $endpoint = 'https://query.wikidata.org/sparql';
	
	public $response_format = 'json';
	
	/*
		
		https://query.wikidata.org/sparql?query=SPARQL
		https://www.mediawiki.org/wiki/Wikidata_query_service/User_Manual#SPARQL_endpoint
	*/
	
	/**
	 *	Return the API endpoint
	 *
	 *	@return String
	 *
	 */
	public function getEndpoint()
	{
		return $this->endpoint;
	}
	
	/**
	 *	Return the response format
	 *
	 *	@return String
	 *
	 */
	public function getResponseFormat()
	{
		return $this->response_format;
	}
	
	/**
	 *	Build a url request from query
	 *
	 *	@return String
	 */
	public function buildUrl($query)
	{
		return $this->getEndpoint() . 
				'?query=' . urlencode($query) .
				'&format='. $this->getResponseFormat() .'';
	}
	
	/**
	 *
	 *
	 *	@return String
	 *
	 */
	public function fetch($url){ 
        $ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, $url); 

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
 
        $output = curl_exec($ch); 

        // close curl
        curl_close($ch);
        
        return $output;
	}
	
	/**
	 *
	 *
	 *	@return WikiCompanyISIN\SparqlResult
	 *
	 */
	public function query($query){
		$response = $this->fetch($this->buildUrl($query));
		
		if ('json' == $this->getResponseFormat()){
			
			return SparqlResult::doFromJson($response);
		}
		
		return false;
	}
	
	
}