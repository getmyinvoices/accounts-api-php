<?php
namespace GetMyInvoices;

require_once '../vendor/autoload.php';


//config file

require_once 'inc/config.php';

//Get list of all documents from the account

//parameters

$param = array();

/*
* param  company_filter optional (integer)
* Company filter. Filter by company. Possible values: 0 = Any, -1 = unassigned or any if from the /listCompanies api.
*/
$param['company_filter'] = 0;

/*
* param  archived_filter optional (integer)
* Archived filter. Filter archived documents. Possible values: 0 = Only not archived, 1 = Any, 2 = Only archived
*/
$param['archived_filter'] = 0;

/*
* param  document_type_filter optional (string)
* Document type filter. Possible values: INCOMING_INVOICE / RECEIPT / PAYMENT_RECEIPT / EXPENSE_REIMBURSEMENT / SALES_INVOICE / CREDIT_NOTE / STATEMENT / DELIVERY_NOTE / ORDER_CONFIRMATION / PAYROLL / COMPANY_REGISTRATION_DOCUMENT / MISC / TRAVEL_EXPENSES
*/
$param['document_type_filter'] = '';

/*
* param  note_filter optional (string)
* Note filter. 
*/
$param['note_filter'] = '';

/*
* param  start_date_filter optional (string)
* Start document date filter. example 2017-08-18 (format: YYYY-MM-DD)
*/
$param['start_date_filter'] = '';

/*
*param  end_date_filter optional (string)
*End document date filter. example 2020-08-18 (format: YYYY-MM-DD)
*/
$param['end_date_filter'] = '';

/*
* param  prim_uid_exclusion_filter optional (string)
* Comma separated list of prim_uids that should not be in the results
*/
$param['prim_uid_exclusion_filter'] = '';

/*
* param  prim_uid_start_filter optional (integer)
* prim_uid that can be used to limit result to only higher prim_uids
*/
$param['prim_uid_start_filter'] = '';

/*
* param  updated_or_new_since_filter optional (integer)
* Limit result to documents modified or created after given date.
* example 2027-08-18 18:12:50
*/
$param['updated_or_new_since_filter'] = '';

/*
* param
* api_key required (string)
* API key of account
*/
$param['api_key'] = GETMYINVOICES_ACCOUNTS_API_KEY;

$gmi = new RestClient();
$gmi->setSslverify(false);
$response = $gmi->listDocuments($param);
print_r($response);