<?php
namespace GetMyInvoices;

require_once '../vendor/autoload.php';

//config file

require_once 'inc/config.php';

// Create a transaction of bank account.

/*
*param bankAccountUid required (integer)
*ID of BankAccount from /listBankAccounts
*/
$bankAccountUid = 31619;

//parameters

$param = array();

/*
*param bookingDate required (date)
*Date of booking.
*/
$param['bookingDate'] = '2019-08-29';

/*
*param valueDate required (date)
*Value Date.
*/
$param['valueDate'] = '2019-08-29';

/*
*param description required (string)
*Description.
*/
$param['description'] = 'test description';

/*
*param amount required (float)
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
$response = $gmi->createTransaction($api_key, $param, $bankAccountUid);
print_r($response);
