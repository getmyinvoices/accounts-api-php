<?php
namespace GetMyInvoices;

use GetMyInvoices\Exceptions\GetMyInvoicesRestException;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;

/**
 * Class RestClient
 * @package GetMyInvoices
*/
class RestClient
{
    
	 /**
     * @var API URL
     */
     public $url = 'https://api.getmyinvoices.com/accounts/';
	 
	 /**
     * @var API Version
     */
	 public $apiVersion = 'v2';
	 
	 /**
     * @var timeout default
     */
	 public $timeout = 60;
	 
	 /**
     * @var Sslverify
     */
	 public $Sslverify = true;
	 private $httpClient;
	
	
	public function __construct()
    {
        $this->httpClient = new HttpClient();
    }
	
	 /**
     * Set default timeout for all the requests
     *
     * @param int $timeout
     */	 
    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;
    }
	
	 /**
     * Set SSL Verify for all the requests
     *
     * @param int $Sslverify
     */	 
    public function setSslverify($Sslverify)
    {
        $this->Sslverify = $Sslverify;
    }
   	
	/**
     *  Set the api Version
     *
     *  @param string $apiVersion
     *  @return $this
     */
    public function setApiVersion($apiVersion)
    {
        $this->apiVersion = trim($apiVersion);
        return $this;
    }
	
	/**
     *  Set the url
     *
     * @return string
     */	 
	public function getURL()
	{
		return $this->url.$this->apiVersion.'/';
	}
	
	/**
	 *  Make a request post
	 *
	 * @param $param
	 * @param $method
	 *
	 * @return mixed|string $response
	 */
	public function post($param,$method)
    {
		
		$apiMethodUrl =  $this->getURL().$method;
		
	  
	try
	{
	   
        $result = $this->httpClient->request('POST',$apiMethodUrl,['verify' => $this->Sslverify, 'json' =>$param,
		'timeout' =>$this->timeout,
		'headers' => ['Accept' => 'application/json',
					'Content-type' => 'application/json']
		]);
		
		return $result->getBody()->getContents();
	}
	catch (GetMyInvoicesRestException $e)
	{
		if ($e->hasResponse()) {
			$exception = (string) $e->getResponse()->getBody();
			$exception = json_decode($exception);
			return $exception;
		  } else {
			return $e->getMessage();
		  }
	}
	
    }
	
	/**
	 * Method getApiStatus
	 * Check API status
	 *
	 * @param $param
	 *
	 * @return mixed|string
	 */
	public function getApiStatus($param)
	{
		$method ='apiStatus';
		
		return $this->post($param,$method);
	}
	
	/**
	 * Method listCompanies
	 * Get list of all companys from the account.
	 *
	 * @param $param
	 *
	 * @return mixed|string
	 */
	public function listCompanies($param)
	{
		$method ='listCompanies';
		
		return $this->post($param,$method);
	}
	
	/**
	 * Method getCompany
	Get one company from the account.
	 * @param $param
	 * @return mixed|string
*/
	public function getCompany($param)
	{
		$method ='getCompany';
		
		return $this->post($param,$method);
	}
	
	/**
	 * Method listDocuments
	Get list of all documents from the account.
	 * @param $param
	 * @return mixed|string
*/
	public function listDocuments($param)
	{
		$method ='listDocuments';
		
		return $this->post($param,$method);
	}
	
	/**
	 * Method getDocument
	Get one document from the account.
	 * @param $param
	 * @return mixed|string
*/
	public function getDocument($param)
	{
		$method ='getDocument';
		
		return $this->post($param,$method);
	}
	
	/**
	 * Method uploadNewDocument
	Upload a new document to the account. Supported file types: pdf
	 * @param $param
	 * @return mixed|string
*/
	public function uploadNewDocument($param)
	{
		$method ='uploadNewDocument';
		
		return $this->post($param,$method);
	}
	
	/**
	 * Method updateDocument
	Update metadata of existing document in the account.
	 * @param $param
	 * @return mixed|string
*/
	public function updateDocument($param)
	{
		$method ='updateDocument';
		
		return $this->post($param,$method);
	}

	/**
	 * Method deleteDocument
	Delete one document from the account.
	 * @param $param
	 * @return mixed|string
*/
	public function deleteDocument($param)
	{
		$method ='deleteDocument';
		
		return $this->post($param,$method);
	}
	
	/**
	 * Method getCountries
	Get list of all available countries.
	 * @param $param
	 * @return mixed|string
*/
	public function getCountries($param)
	{
		$method ='getCountries';
		
		return $this->post($param,$method);
	}
	
	/**
	 * Method getCurrencies
	Get list of all available currencies
	 * @param $param
	 * @return mixed|string
*/
	public function getCurrencies($param)
	{
		$method ='getCurrencies';
		
		return $this->post($param,$method);
	}
	
	/**
	 * Method addCustomCompany
	Add new custom company
	 * @param $param
	 * @return mixed|string
*/
	public function addCustomCompany($param)
	{
		$method ='addCustomCompany';
		
		return $this->post($param,$method);
	}
	
	/**
	 * Method updateCustomCompany
	Update existing custom company.
	 * @param $param
	 * @return mixed|string
*/
	public function updateCustomCompany($param)
	{
		$method ='updateCustomCompany';
		
		return $this->post($param,$method);
	}
	
	/**
	 * Method deleteCustomCompany
	Delete existing custom company.
	 * @param $param
	 * @return mixed|string
*/
	public function deleteCustomCompany($param)
	{
		$method ='deleteCustomCompany';
		
		return $this->post($param,$method);
	}
	
	/**
	 * Method listAttachments
	Get list of all attachments for an invoice.
	 * @param $param
	 * @return mixed|string
*/
	public function listAttachments($param)
	{
		$method ='listAttachments';
		
		return $this->post($param,$method);
	}
	
	/**
	 * Method uploadAttachment
	Upload a single attachment to invoice.
	 * @param $param
	 * @return mixed|string
*/
	public function uploadAttachment($param)
	{
		$method ='uploadAttachment';
		
		return $this->post($param,$method);
	}
	
	/**
	 * Method deleteAttachment
	Delete a specific attachment of invoice.
	 * @param $param
	 * @return mixed|string
*/
	public function deleteAttachment($param)
	{
		$method ='deleteAttachment';
		
		return $this->post($param,$method);
	}


}
