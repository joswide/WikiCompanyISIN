<?php
namespace Joswide\WikiCompanyISIN;

class WbEntities{
	
	public $data;
	
		
	// https://www.wikidata.org/w/api.php?action=wbgetentities&ids=Q26678&format=json
	public function loadIds($ids)
	{
		$url = $this->buildUrl($ids);
		
		$jsoned = $this->fetch($url);
		
		$this->data = json_decode($jsoned);
	}
	
	
	public function buildUrl($ids)
	{
		$ids_string = implode(',', $ids);
		
		return 'https://www.wikidata.org/w/api.php?action=wbgetentities&ids='. $ids_string .'&format=json';
	}
	
	
	
	/**
	 *	Fetch URL
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
	
	
}