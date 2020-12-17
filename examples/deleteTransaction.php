<?php
namespace GetMyInvoices;

require_once '../vendor/autoload.php';

//config file

require_once 'inc/config.php';

// Delete one transaction from bank account

//parameters

$param = array();

/*
*param bankAccountUid required (integer)
*ID of BankAccount from /listBankAccounts
*/
$param['bankAccountUid'] = 31623;

/*
*param transactionUid required (integer)
*ID of Bank Transaction from /ListTransactions
*/
$param['transactionUid'] = 31623;


/*
*param
api_key required (string)
API key of account
*/
$api_key = GETMYINVOICES_ACCOUNTS_API_KEY;

$gmi = new RestClient();
$gmi->setSslverify(false);
$response = $gmi->deleteTransaction($api_key, $param);
print_r($response);
