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
$param['invoice_id'] = 740040;

/*
*param
api_key required (string)
API key of account
*/
$param['api_key'] = GETMYINVOICES_ACCOUNTS_API_KEY;

$gmi = new RestClient();
$gmi->setSslverify(false);
$response = $gmi->listAttachments($param);
print_r($response);
