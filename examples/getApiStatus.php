<?php
namespace GetMyInvoices;

require_once '../vendor/autoload.php';

//config file

require_once 'inc/config.php';

// Check API status.

//parameters

/*
*param
api_key: required (string)
API key of account
*/
$api_key = GETMYINVOICES_ACCOUNTS_API_KEY;

$gmi = new RestClient();
$gmi->setApiVersion('v3');
$gmi->setSslverify(false);
$response = $gmi->getApiStatus($api_key);
print_r($response);
