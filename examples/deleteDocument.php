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
$param['documentUid'] = 31623;

/*
*param
api_key required (string)
API key of account
*/
$api_key = GETMYINVOICES_ACCOUNTS_API_KEY;

$gmi = new RestClient();
$gmi->setSslverify(false);
$response = $gmi->deleteDocument($api_key, $param);
print_r($response);
