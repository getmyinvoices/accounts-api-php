<?php
namespace GetMyInvoices;

require_once '../vendor/autoload.php';

//config file

require_once 'inc/config.php';

// Update metadata of existing transaction in the account.

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
*param bookingDate optional (date)
*Date of booking.
*/
$param['bookingDate'] = '2019-08-29';

/*
*param valueDate optional (date)
*Value Date.
*/
$param['valueDate'] = '2019-08-29';

/*
*param description optional (string)
*Description.
*/
$param['description'] = 'test description';

/*
*param amount optional (float)
*Amount.
*/
$param['amount'] = 100.76;

/*
*param currencyCode optional (string)
*Currency Code.
*/
$param['currencyCode'] = 'EUR';

/*
*param transactionType optional (string)
*Transaction type.
*/
$param['transactionType'] = 'Lastschrift';

/*
*param
api_key required (string)
API key of account
*/
$api_key = GETMYINVOICES_ACCOUNTS_API_KEY;

$gmi = new RestClient();
$gmi->setSslverify(false);
$response = $gmi->updateTransaction($api_key, $param, $bankAccountUid, $transactionUid);
print_r($response);
