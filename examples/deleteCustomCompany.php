<?php
namespace GetMyInvoices;

require_once '../vendor/autoload.php';

//config file

require_once 'inc/config.php';

// Delete existing custom company.


//parameters

$param = array();

/*
*param company_id required (integer)
*PRIM_UID of the company.
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
$response = $gmi->deleteCustomCompany($api_key, $param);
print_r($response);
