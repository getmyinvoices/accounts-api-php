<?php
namespace GetMyInvoices;

require_once '../vendor/autoload.php';

//config file

require_once 'inc/config.php';

// Update existing custom company.


//parameters

$param = array();

/*
*param id required (integer)
*PRIM_UID of the company.
*/
$companyUid = 29544;

/*
*param name required (string)
*Name of the company.
*/
$param['name'] = 'GetMyInvoices-com';

/*
*param country required (integer)
*PRIM_UID of the country.
*/
$param['countryUid'] = 76;

/*
*param tags optional (array)
*Tags (Comma separated tags)
*/
$param['tags'] = ['Hosting', 'Software', 'Invoices'];

/*
*param street optional (string)
*Street
*/
$param['street'] = 'Musterring';

/*
*param zip (string)
*ZIP code
*/
$param['zip'] = '12456';

/*
*param city optional (string)
*City
*/
$param['city'] = 'Musterhausen';

/*
*param email optional (string)
*Email
*/
$param['email'] = 'support@getmyinvoices.com';

/*
*param phone optional (string)
*Phone
*/
$param['phone'] = '123456789';

/*
*param fax optional (string)
*Fax
*/
$param['fax'] = '123456780';

/*
*param tax_number optional (string)
*Tax Number
*/
$param['taxNumber'] = 'XX-XXXXX';

/*
*param vat_id optional (string)
*VAT ID
*/
$param['vatId'] = 'DE999999999';

/*
*param commercial_register optional (string)
*Commercial Register
*/
$param['commercialRegister'] = 'Berlin';

/*
*param iban optional (string)
*IBAN
*/
$param['iban'] = 'DE89370400440532013000';

/*
*param bic optional (string)
*BIC
*/
$param['bic'] = 'PBNKDEFF';

/*
*param url optional (string)
*URL
*/
$param['url'] = 'https://www.getmyinvoices.com/';

/*
*param
api_key required (string)
API key of account
*/

$api_key = GETMYINVOICES_ACCOUNTS_API_KEY;

$gmi = new RestClient();
$gmi->setSslverify(false);
$response = $gmi->updateCustomCompany($api_key, $param, $companyUid);
echo(json_encode($response));
