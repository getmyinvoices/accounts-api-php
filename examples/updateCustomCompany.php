<?php
namespace GetMyInvoices;

require_once '../vendor/autoload.php';

//config file

require_once 'inc/config.php';

// Update existing custom company.


//parameters

$param = array();

/*
*param company_id required (integer)
*PRIM_UID of the company.
*/
$param['company_id'] = 732241;

/*
*param company_name required (string)
*Name of the company.
*/
$param['company_name'] = 'GetMyInvoices';

/*
*param company_country required (integer)
*PRIM_UID of the country.
*/
$param['company_country'] = 76;

/*
*param company_tags optional (string)
*Tags (Comma separated tags)
*/
$param['company_tags'] = 'Hosting, Software, Invoices';

/*
*param company_street optional (string)
*Street
*/
$param['company_street'] = 'Musterring';

/*
*param company_zip (string)
*ZIP code
*/
$param['company_zip'] = '12456';

/*
*param company_city optional (string)
*City
*/
$param['company_city'] = 'Musterhausen';

/*
*param company_email optional (string)
*Email
*/
$param['company_email'] = 'support@getmyinvoices.com';

/*
*param company_phone optional (string)
*Phone
*/
$param['company_phone'] = '123456789';

/*
*param company_fax optional (string)
*Fax
*/
$param['company_fax'] = '123456780';

/*
*param company_tax_number optional (string)
*Tax Number
*/
$param['company_tax_number'] = 'XX-XXXXX';

/*
*param company_vat_id optional (string)
*VAT ID
*/
$param['company_vat_id'] = 'DE999999999';

/*
*param company_commercial_register optional (string)
*Commercial Register
*/
$param['company_commercial_register'] = 'Berlin';

/*
*param company_iban optional (string)
*IBAN
*/
$param['company_iban'] = 'DE89370400440532013000';

/*
*param company_bic optional (string)
*BIC
*/
$param['company_bic'] = 'PBNKDEFF';

/*
*param company_url optional (string)
*URL
*/
$param['company_url'] = 'https://www.getmyinvoices.com/';

/*
*param
api_key required (string)
API key of account
*/

$param['api_key'] = GETMYINVOICES_ACCOUNTS_API_KEY;

$gmi = new RestClient();
$gmi->setSslverify(false);
$response = $gmi->updateCustomCompany($param);
echo(json_encode($response));
