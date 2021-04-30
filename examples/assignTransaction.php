<?php
namespace GetMyInvoices;

require_once '../vendor/autoload.php';

//config file

require_once 'inc/config.php';

// Assign a transaction of bank account.

/*
*param bankAccountUid required (integer)
*ID of BankAccount from /listBankAccounts
*/
$bankAccountUid = 31619;

/*
*param transactionUid required (integer)
*ID of Bank Transaction from /ListTransactions
*/
$transactionUid = 31619;

//parameters

$param = array();

/*
*param documentUid required (integer)
*PRIM_UID of the document.
*/
$param['documentUid'] = 28715;

/*
*param
api_key required (string)
API key of account
*/
$api_key = GETMYINVOICES_ACCOUNTS_API_KEY;

$gmi = new RestClient();
$gmi->setSslverify(false);
$response = $gmi->assignTransaction($api_key, $param, $bankAccountUid, $transactionUid);
print_r($response);
