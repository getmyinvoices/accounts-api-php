<?php
namespace GetMyInvoices;

require_once '../vendor/autoload.php';

//config file

require_once 'inc/config.php';

// Delete a specific attachment.


//parameters

$param = array();

/*
*param attachment_uid required (integer)
*UID of the Attachment.
*/
$param['attachment_uid'] = 4;

/*
*param
api_key required (string)
API key of account
*/
$param['api_key'] = GETMYINVOICES_ACCOUNTS_API_KEY;

$gmi = new RestClient();
$gmi->setSslverify(false);
$response = $gmi->deleteAttachment($param);
print_r($response);
