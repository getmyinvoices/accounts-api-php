<?php
namespace GetMyInvoices;

require_once '../vendor/autoload.php';

//config file

require_once 'inc/config.php';

// Get list of all companys from the account.

//parameters

$param = array();

/*
*param  status_filter optional (integer)
*Status filter. Possible values: 0 = Any, 1 = Active, -1 = Inactive, -2 = Pending
*/
$param['statusFilter'] = '';

/*
*param  company_type_filter optional (string)
*Company type filter. Possible values: 0 = Any, ONLINE_PORTAL = Online-Portal only, CUSTOM_COMPANY = Custom company only
*/

$param['companyTypeFilter'] = '';
/*
*param
api_key required (string)
API key of account
*/

$api_key = GETMYINVOICES_ACCOUNTS_API_KEY;

$gmi = new RestClient();
$gmi->setSslverify(false);
$response = $gmi->listCompanies($api_key, $param);
print_r($response);
