<?php
namespace GetMyInvoices;

require_once '../vendor/autoload.php';

//config file

require_once 'inc/config.php';

// Update balance of existing bank account.

/*
*param bankAccountUid required (integer)
*ID of BankAccount from /listBankAccounts
*/
$bankAccountUid = 31619;

//parameters

$param = array();

/*
*param balance required (float)
*new balance value
*/
$param['balance'] = 320.76;

/*
*param company_id optional (String)
*currentcy code
*/
$param['currencyCode'] = 'EUR';



/*
*param
api_key required (string)
API key of account
*/
$api_key = GETMYINVOICES_ACCOUNTS_API_KEY;

$gmi = new RestClient();
$gmi->setSslverify(false);
$response = $gmi->updateBankAccountBalance($api_key, $param, $bankAccountUid);
print_r($response);
