<?php
namespace GetMyInvoices\Exceptions;

use GuzzleHttp\Exception\ClientException;
use Throwable;

/**
 * Class GetMyInvoicesResponseException
 * @package GetMyInvoices\Exceptions
 */
class GetMyInvoicesResponseException extends GetMyInvoicesRestException
{
    /**
     * @var array Decoded response
     */
    protected $responseData;
    /**
     * @var integer http status code
     */
    protected $statusCode;

    /**
     * ResponseException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     * @param array $responseData
     * @param integer $statusCode
     */
    public function __construct($message = '', $code = 0, Throwable $previous = null, $responseData, $statusCode)
    {
        $this->responseData = $responseData;
        $this->statusCode = $statusCode;
        parent::__construct($message, $code, $this->getException($this->getErrorMessage()));
    }

    /**
     * Retrieves the error message from the response
     * @return null|string
     */
    public function getErrorMessage()
    {
        if (array_key_exists('error', $this->responseData?: [])) {
            if (is_string($this->responseData['error'])) {
                return json_encode($this->responseData['error']);
            } elseif(array_key_exists('error', $this->responseData['error'])) {
                return json_encode($this->responseData['error']['error']);
            } else {
                return json_encode($this->responseData['error']);
            }
        } else {
            return null;
        }
    }

    /**
     * Returns an exceptions with a message based on the status code
     * @param string $message
     * @return GetMyInvoicesAuthenticationException|GetMyInvoicesNotFoundException|GetMyInvoicesRequestException|GetMyInvoicesRestException|GetMyInvoicesServerException|GetMyInvoicesValidationException
     */
    public function getException($message)
    {
        // make exception based on the status code
        switch ($this->statusCode) {
            case 400:
                return
                    $message?
                        new GetMyInvoicesValidationException($message):
                        new GetMyInvoicesValidationException(
                            'A parameter is missing or '.'is invalid while accessing resource');
                break;
            case 401:
                return
                    $message?
                        new GetMyInvoicesAuthenticationException($message):
                        new GetMyInvoicesAuthenticationException('Failed to authenticate while accessing resource');
                break;
            case 404:
                return
                    $message?
                        new GetMyInvoicesNotFoundException($message):
                        new GetMyInvoicesNotFoundException('Failed to authenticate while accessing resource');
                break;
            case 405:
                return
                    $message?
                        new GetMyInvoicesRequestException($message):
                        new GetMyInvoicesRequestException('HTTP method used is not allowed to access resource');
                break;
            case 500:
                return
                    $message?
                        new GetMyInvoicesServerException($message):
                        new GetMyInvoicesServerException('A server error occurred while accessing resource');
                break;
            default:
                return new GetMyInvoicesRestException(json_encode($this->responseData));
        }

    }
}