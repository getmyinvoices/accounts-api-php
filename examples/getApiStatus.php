<?php
namespace GetMyInvoices;

require_once '../vendor/autoload.php';

//config file

require_once 'inc/config.php';

//Check API status.

//parameters

$param = array();

/*
*param
api_key: required (string)
API key of account
*/
$param['api_key'] = GETMYINVOICES_ACCOUNTS_API_KEY;

$gmi = new RestClient();
$gmi->setApiVersion('v2');
$gmi->setSslverify(false);
$response = $gmi->getApiStatus($param);
print_r($response);