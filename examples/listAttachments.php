<?php
namespace GetMyInvoices;

require_once '../vendor/autoload.php';

//config file

require_once 'inc/config.php';

// Get list of all attachments for an invoice.


//parameters

$param = array();

/*
*param invoice_id required (integer)
*PRIM_UID of the invoice.
*/
$param['documentUid'] = 31619;

/*
*param
api_key required (string)
API key of account
*/
$api_key = GETMYINVOICES_ACCOUNTS_API_KEY;

$gmi = new RestClient();
$gmi->setSslverify(false);
$response = $gmi->listAttachments($api_key, $param);
print_r($response);
