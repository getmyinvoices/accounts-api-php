<?php
namespace GetMyInvoices;

require_once '../vendor/autoload.php';

//config file

require_once 'inc/config.php';

//Get list of all Transactions of banck account.

/*
*param bankAccountUid required (integer)
*ID of BankAccount from /listBankAccounts
*/
$bankAccountUid = 31619;

//parameters

$param = array();

/*
*param  start Date Filter optional (date)
*/
$param['startDateFilter'] = '2019-05-12';

/*
*param  end Date Filter optional (date)
*/

$param['endDateFilter'] = '2019-05-13';
/*
*param
api_key required (string)
API key of account
*/

$api_key = GETMYINVOICES_ACCOUNTS_API_KEY;

$gmi = new RestClient();
$gmi->setSslverify(false);
$response = $gmi->listTransactions($api_key, $param, $bankAccountUid);
print_r($response);
