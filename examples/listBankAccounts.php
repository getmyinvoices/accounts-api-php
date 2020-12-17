<?php
namespace GetMyInvoices;

require_once '../vendor/autoload.php';

//config file

require_once 'inc/config.php';

// Get list of all bank accounts.

//parameters

$param = array();

/*
*param  offset optional (integer)
*/
$param['offset'] = 10;

/*
*param  limit optional (string)
*/

$param['limit'] = 20;
/*
*param
api_key required (string)
API key of account
*/

$api_key = GETMYINVOICES_ACCOUNTS_API_KEY;

$gmi = new RestClient();
$gmi->setSslverify(false);
$response = $gmi->listBankAccounts($api_key, $param);
print_r($response);
