<?php
namespace GetMyInvoices;

require_once '../vendor/autoload.php';

//config file

require_once 'inc/config.php';

// Get one document from the account

//parameters

$param = array();

/*
*param  document_prim_uid required (integer)
*prim_uid of the document.
*/
$param['document_prim_uid'] = 740040;

/*
*param  load_line_items optional (boolean)
*Set to true if you want to receive line items as well
*/
$param['load_line_items'] = true;

/*
*param  readable_text optional (boolean)
*Set to true if you want to receive readable text from document
*/
$param['readable_text'] = true;

/*
*param
api_key required (string)
API key of account
*/
$param['api_key'] = GETMYINVOICES_ACCOUNTS_API_KEY;

$gmi = new RestClient();
$gmi->setSslverify(false);
$response = $gmi->getDocument($param);
print_r($response);