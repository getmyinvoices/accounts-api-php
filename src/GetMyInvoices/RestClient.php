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
    public $apiVersion = 'v3';
     
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
     *  Make a request get
     *
     * @param $param
     * @param $method
     *
     * @return mixed|string $response
     */
    public function getmethod($api_key, $param, $method)
    {
        $apiMethodUrl =  $this->getURL().$method;

        try {
            $result = $this->httpClient->request('GET', $apiMethodUrl, ['verify' => $this->Sslverify, 'json' =>$param,
                'timeout' =>$this->timeout,
                'headers' => ['Accept' => 'application/json',
                'Content-type' => 'application/json',
                'X-API-KEY' => $api_key]
            ]);

            return $result->getBody()->getContents();
        } catch (GetMyInvoicesRestException $e) {
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
     *  Make a request post
     *
     * @param $param
     * @param $method
     *
     * @return mixed|string $response
     */
    public function post($api_key, $param, $method)
    {
        $apiMethodUrl =  $this->getURL().$method;

        try {
            $result = $this->httpClient->request('POST', $apiMethodUrl, ['verify' => $this->Sslverify, 'json' =>$param,
                'timeout' =>$this->timeout,
                'headers' => ['Accept' => 'application/json',
                'Content-type' => 'application/json',
                'X-API-KEY' => $api_key]
            ]);

            return $result->getBody()->getContents();
        } catch (GetMyInvoicesRestException $e) {
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
     *  Make a request put
     *
     * @param $param
     * @param $method
     *
     * @return mixed|string $response
     */
    public function put($api_key, $param, $method)
    {
        $apiMethodUrl =  $this->getURL().$method;

        try {
            $result = $this->httpClient->request('PUT', $apiMethodUrl, ['verify' => $this->Sslverify, 'json' =>$param,
                'timeout' =>$this->timeout,
                'headers' => ['Accept' => 'application/json',
                'Content-type' => 'application/json',
                'X-API-KEY' => $api_key]
            ]);

            return $result->getBody()->getContents();
        } catch (GetMyInvoicesRestException $e) {
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
     *  Make a request delete
     *
     * @param $param
     * @param $method
     *
     * @return mixed|string $response
     */
    public function delete($api_key, $method)
    {
        $apiMethodUrl =  $this->getURL().$method;

        try {
            $result = $this->httpClient->request('DELETE', $apiMethodUrl, ['verify' => $this->Sslverify,
                'timeout' =>$this->timeout,
                'headers' => ['Accept' => 'application/json',
                'Content-type' => 'application/json',
                'X-API-KEY' => $api_key]
            ]);

            return $result->getBody()->getContents();
        } catch (GetMyInvoicesRestException $e) {
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
    public function getApiStatus($api_key)
    {
        $param = array();

        $method ='apiStatus';
        
        return $this->getmethod($api_key, $param, $method);
    }
    
    /**
     * Method listCompanies
     * Get list of all companys from the account.
     *
     * @param $param
     *
     * @return mixed|string
     */
    public function listCompanies($api_key, $param)
    {
        $method ='companies';
        
        return $this->getmethod($api_key, array(), $method);
    }
    
    /**
     * Method getCompany
     * Get one company from the account.
     * @param $param
     * @return mixed|string
    */
    public function getCompany($api_key, $param)
    {
        $method ='companies/'.$param['companyUid'];
        
        return $this->getmethod($api_key, array(), $method);
    }

    /**
     * Method addCustomCompany
     * Add new custom company
     * @param $param
     * @return mixed|string
    */
    public function addCustomCompany($api_key, $param)
    {
        $method ='companies';
        
        return $this->post($api_key, $param, $method);
    }
    
    /**
     * Method updateCustomCompany
     * Update existing custom company.
     * @param $param
     * @return mixed|string
    */
    public function updateCustomCompany($api_key, $param, $companyUid)
    {
        $method ='companies/'.$companyUid;
        
        return $this->post($api_key, $param, $method);
    }
    
    /**
     * Method deleteCustomCompany
     * Delete existing custom company.
     * @param $param
     * @return mixed|string
    */
    public function deleteCustomCompany($api_key, $param)
    {
        $method ='companies/'.$param['companyUid'];
        
        return $this->delete($api_key, $method);
    }
    
    /**
     * Method listDocuments
     * Get list of all documents from the account.
     * @param $param
     * @return mixed|string
    */
    public function listDocuments($api_key, $param)
    {
        $method ='documents';
        
        return $this->getmethod($api_key, array(), $method);
    }
    
    /**
     * Method getDocument
     * Get one document from the account.
     * @param $param
     * @return mixed|string
    */
    public function getDocument($api_key, $param)
    {
        $method ='documents/'.$param['documentPrimUid'];
        
        return $this->getmethod($api_key, array(), $method);
    }
    
    /**
     * Method uploadNewDocument
     * Upload a new document to the account. Supported file types: pdf
     * @param $param
     * @return mixed|string
    */
    public function uploadNewDocument($api_key, $param)
    {
        $method ='documents';
        
        return $this->post($api_key, $param, $method);
    }
    
    /**
     * Method updateDocument
     * Update metadata of existing document in the account.
     * @param $param
     * @return mixed|string
    */
    public function updateDocument($api_key, $param, $documentUid)
    {
        $method ='documents/'.$documentUid;
        
        return $this->put($api_key, $param, $method);
    }

    /**
     * Method deleteDocument
     * Delete one document from the account.
     * @param $param
     * @return mixed|string
    */
    public function deleteDocument($api_key, $param)
    {
        $method ='documents/'.$param['documentUid'];
        
        return $this->delete($api_key, $method);
    }
    
    /**
     * Method getCountries
     * Get list of all available countries.
     * @param $param
     * @return mixed|string
    */
    public function getCountries($api_key, $param)
    {
        $method ='countries';
        
        return $this->getmethod($api_key, array(), $method);
    }
    
    /**
     * Method getCurrencies
     * Get list of all available currencies
     * @param $param
     * @return mixed|string
    */
    public function getCurrencies($api_key, $param)
    {
        $method ='currencies';

        return $this->getmethod($api_key, array(), $method);
    }

    /**
     * Method getTags
     * Get list of all available tags
     * @param $param
     * @return mixed|string
    */
    public function getTags($api_key, $param)
    {
        $method ='tags';

        return $this->getmethod($api_key, array(), $method);
    }

    /**
     * Method getVatRates
     * Get list of all available Vat Rates
     * @param $param
     * @return mixed|string
    */
    public function getVatRates($api_key, $param)
    {
        $method ='vatRates';

        return $this->getmethod($api_key, array(), $method);
    }
    
    /**
     * Method listAttachments
     * Get list of all attachments for an invoice.
     * @param $param
     * @return mixed|string
    */
    public function listAttachments($api_key, $param)
    {
        $method ='documents/'.$param['documentUid'].'/attachments';
        
        return $this->getmethod($api_key, array(), $method);
    }
    
    /**
     * Method uploadAttachment
     * Upload a single attachment to invoice.
     * @param $param
     * @return mixed|string
    */
    public function uploadAttachment($api_key, $param, $documentUid)
    {
        $method ='documents/'.$documentUid.'/attachments';
        
        return $this->post($api_key, $param, $method);
    }

    /**
     * Method getOneAttachment
     * Get One attachment for an invoice.
     * @param $param
     * @return mixed|string
    */
    public function getOneAttachment($api_key, $param)
    {
        $method ='documents/'.$param['documentUid'].'/attachments/'.$param['attachmentUid'];
        
        return $this->getmethod($api_key, array(), $method);
    }
    
    /**
     * Method deleteAttachment
     * Delete a specific attachment of invoice.
     * @param $param
     * @return mixed|string
    */
    public function deleteAttachment($api_key, $param)
    {
        $method ='documents/'.$param['documentUid'].'/attachments/'.$param['attachmentUid'];
        
        return $this->delete($api_key, $method);
    }

    /**
     * Method listBankAccounts
     * Get list of all bank accounts.
     * @param $param
     * @return mixed|string
    */
    public function listBankAccounts($api_key, $param)
    {
        $method ='bankAccounts';
        
        return $this->getmethod($api_key, array(), $method);
    }

    /**
     * Method updateBankAccountBalance
     * Update balance of existing bankAccount in the account.
     * @param $param
     * @return mixed|string
    */

    public function updateBankAccountBalance($api_key, $param, $bankAccountUid)
    {
        $method ='bankAccounts/'.$bankAccountUid;
        
        return $this->put($api_key, $param, $method);
    }

    /**
     * Method listTransactions
     * Get list of all transactions of bank account.
     * @param $param
     * @return mixed|string
    */

    public function listTransactions($api_key, $param, $bankAccountUid)
    {
        $method ='bankAccounts/'.$bankAccountUid.'/transactions';
        
        return $this->getmethod($api_key, array(), $method);
    }

    /**
     * Method createTransaction
     * Create a transaction of bank account.
     * @param $param
     * @return mixed|string
    */

    public function createTransaction($api_key, $param, $bankAccountUid)
    {
        $method ='bankAccounts/'.$bankAccountUid.'/transactions';
        
        return $this->post($api_key, $param, $method);
    }

    /**
     * Method updateTransaction
     * Update metadata of existing transaction in the account.
     * @param $param
     * @return mixed|string
    */

    public function updateTransaction($api_key, $param, $bankAccountUid, $transactionUid)
    {
        $method ='bankAccounts/'.$bankAccountUid.'/transactions/'.$transactionUid;
        
        return $this->put($api_key, $param, $method);
    }

    /**
     * Method deleteTransaction
     * Delete a specific transaction of bank account.
     * @param $param
     * @return mixed|string
    */

    public function deleteTransaction($api_key, $param)
    {
        $method ='bankAccounts/'.$param['bankAccountUid'].'/transactions/'.$param['transactionUid'];
        
        return $this->delete($api_key, $method);
    }

    /**
     * Method setTransactionTags
     * Set tags of existing transaction in the account.
     * @param $param
     * @return mixed|string
    */

    public function setTransactionTags($api_key, $param, $bankAccountUid, $transactionUid)
    {
        $method ='bankAccounts/'.$bankAccountUid.'/transactions/'.$transactionUid.'/tags';
        
        return $this->put($api_key, $param, $method);
    }

    /**
     * Method assignTransaction
     * Assign a transaction of bank account.
     * @param $param
     * @return mixed|string
    */

    public function assignTransaction($api_key, $param, $bankAccountUid, $transactionUid)
    {
        $method ='bankAccounts/'.$bankAccountUid.'/transactions/'.$transactionUid.'/assign';
        
        return $this->post($api_key, $param, $method);
    }

    /**
     * Method listPortals
     * Get list of all portals from the account.
     * @param $param
     * @return mixed|string
    */

    public function listPortals($api_key, $param)
    {
        $method ='portals';
        
        return $this->getmethod($api_key, array(), $method);
    }
}
