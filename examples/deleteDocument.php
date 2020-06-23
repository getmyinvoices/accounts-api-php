<?php
namespace GetMyInvoices;

require_once '../vendor/autoload.php';

//config file

require_once 'inc/config.php';

// Delete one document from the account

//parameters

$param = array();

/*
*param  document_prim_uid required (integer)
*prim_uid of the document.
*/
$param['document_prim_uid'] = 740040;

/*
*param
api_key required (string)
API key of account
*/
$param['api_key'] = GETMYINVOICES_ACCOUNTS_API_KEY;

$gmi = new RestClient();
$gmi->setSslverify(false);
$response = $gmi->deleteDocument($param);
print_r($response);