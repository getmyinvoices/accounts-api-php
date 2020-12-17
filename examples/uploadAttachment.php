<?php
namespace GetMyInvoices;

require_once '../vendor/autoload.php';

//config file

require_once 'inc/config.php';

// Upload a single attachment to invoice.


//parameters

/*
*param invoice_id optional (integer)
*PRIM_UID of the invoice.
*/
$documentUid = 740040;


$param = array();

/*
*param file_name required (string)
*Name of the file with extension.
*/
$param['fileName'] = 'sample_pdf_attachment.pdf';

/*
*param file_content optional (string)
*File content; base64 encoded
*/
$file=file_get_contents('file/sample_pdf_attachment.pdf');

$param['fileContent'] = base64_encode($file);


/*
*param
api_key required (string)
API key of account
*/
$api_key = GETMYINVOICES_ACCOUNTS_API_KEY;

$gmi = new RestClient();
$gmi->setSslverify(false);
$response = $gmi->uploadAttachment($api_key, $param, $documentUid);
print_r($response);
