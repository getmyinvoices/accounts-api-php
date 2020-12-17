<?php
namespace GetMyInvoices;

require_once '../vendor/autoload.php';

//config file

require_once 'inc/config.php';

// Get One attachment for an invoice.

//parameters

$param = array();

/*
*param document_uid required (integer)
*UID of the Attachment.
*/
$param['documentUid'] = 31623;

/*
*param attachment_uid required (integer)
*UID of the Attachment.
*/
$param['attachmentUid'] = 4;

/*
*param
api_key required (string)
API key of account
*/
$api_key = GETMYINVOICES_ACCOUNTS_API_KEY;

$gmi = new RestClient();
$gmi->setSslverify(false);
$response = $gmi->getOneAttachment($api_key, $param);
print_r($response);
