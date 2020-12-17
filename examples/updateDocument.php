<?php
namespace GetMyInvoices;

require_once '../vendor/autoload.php';

//config file

require_once 'inc/config.php';

// Update metadata of existing document in the account.

//parameters

$param = array();

/*
*param document_prim_uid required (integer)
*ID of document from /listDocuments
*/
$documentUid = 31619;


/*
*param company_id optional (integer)
*ID of company from /listCompanies
*/
$param['companyId'] = '29544';

/*
*param document_type optional (string)
*Document type. Possible values: INCOMING_INVOICE / RECEIPT / PAYMENT_RECEIPT / EXPENSE_REIMBURSEMENT / SALES_INVOICE / CREDIT_NOTE /
STATEMENT / DELIVERY_NOTE / ORDER_CONFIRMATION / PAYROLL / COMPANY_REGISTRATION_DOCUMENT / MISC / TRAVEL_EXPENSES
*/
$param['documentType'] = 'SALES_INVOICE';

/*
*param document_number optional (string)
*Document number
*/
$param['documentNumber'] = 'INV-doc-1234';

/*
*param document_date optional (string)
*Document date (format: YYYY-MM-DD)
*/
$param['documentDate'] = '2019-03-16';

/*
*param document_due_date optional (string)
*Document due date (format: YYYY-MM-DD)
*/
$param['documentDueDate'] = '2019-03-19';

/*
*param payment_method optional (string)
*Document Payment Method. Possible values: bank_transfer, cash, check, direct_debit, credit, cc, paypal, online_payment, amazon_pay,
apple_pay, google_pay, external_receivables_management, other
*/
$param['paymentMethod'] = 'check';

/*
*param payment_status optional (string)
*Document Payment Status. Possible values: Unknown, Paid, Not paid
*/
$param['paymentStatus'] = 'Unknown';

/*
*param net_amount optional (string)
*Net amount
*/
$param['netAmount'] = '2000.00';

/*
*param gross_amount optional (string)
*Gross amount
*/
$param['grossAmount'] = '3000.00';

/*
*param currency optional (string)
*Currency code
*/
$param['currency'] = 'EUR';

/*
*param vat optional (integer)
*VAT in percentage
*/
$param['vat'] = 19;

/*
*param cash_discount_date optional (string)
*Cash Discount date (format: YYYY-MM-DD)
*/
$param['cashDiscountDate'] = '2019-03-19';

/*
*param cash_discount_value optional (string)
*Cash Discount value
*/
$param['cashDiscountValue'] = '8.00';

/*
*param is_archived optional (integer)
*Is Archived?
*/
$param['isArchived'] = '1';


/*
*param tags optional (array)
*Tags (Comma separated tags)
*/
$param['tags'] = ['Hosting', 'Software', 'Invoices'];

/*
*param note optional (string)
*Note
*/
$param['note'] = 'Document is for hosting';

/*
*param line_items optional (string)
*line_items in array
*/
$lineItems[] = array('description' => 'HDD 4TB 34', 'quantity' => 1, 'unit_net_price' => 200.00, 'tax_percentage' => 19.00, 'total_gross' => 219.00);
$lineItems[] = array('description' => 'Keyboard 64', 'quantity' => 1, 'unit_net_price' => 400.00, 'tax_percentage' => 19.00, 'total_gross' => 419.00);

$param['lineItems'] = json_encode($lineItems);

/*
*param
api_key required (string)
API key of account
*/
$api_key = GETMYINVOICES_ACCOUNTS_API_KEY;

$gmi = new RestClient();
$gmi->setSslverify(false);
$response = $gmi->updateDocument($api_key, $param, $documentUid);
print_r($response);
