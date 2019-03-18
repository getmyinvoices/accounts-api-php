<?php
namespace GetMyInvoices;

require_once '../vendor/autoload.php';

//config file

require_once 'inc/config.php';

// Get one company from the account

//parameters

$param = array();

/*
*param  company_id required (integer)
*prim_uid of the company.
*/
$param['company_id'] = 732241;

/*
*param
api_key required (string)
API key of account
*/
$param['api_key'] = GETMYINVOICES_ACCOUNTS_API_KEY;

$gmi = new RestClient();
$gmi->setSslverify(false);
$response = $gmi->getCompany($param);
print_r($response);