<?php
namespace GetMyInvoices;

require_once '../vendor/autoload.php';

//config file

require_once 'inc/config.php';

// Get one company from the account

//parameters

$param = array();

/*
*param  companyUid required (integer)
*prim_uid of the company.
*/
$param['companyUid'] = 29544;

/*
*param
api_key required (string)
API key of account
*/
$api_key = GETMYINVOICES_ACCOUNTS_API_KEY;

$gmi = new RestClient();
$gmi->setSslverify(false);
$response = $gmi->getCompany($api_key, $param);
print_r($response);
