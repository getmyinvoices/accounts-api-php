<?php
namespace GetMyInvoices;

require_once '../vendor/autoload.php';

//config file

require_once 'inc/config.php';

// Get list of all available currencies


//parameters

$param = array();

/*
*param
api_key required (string)
API key of account
*/
$param['api_key'] = GETMYINVOICES_ACCOUNTS_API_KEY;

$gmi = new RestClient();
$gmi->setSslverify(false);
$response = $gmi->getCurrencies($param);
print_r($response);