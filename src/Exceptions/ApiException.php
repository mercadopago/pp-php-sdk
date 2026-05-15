<?php

namespace MercadoPago\PP\Sdk\Exceptions;

/**
 * Class ApiException
 *
 * Thrown when the API returns a failed response.
 * Extends \Exception so existing catch (\Exception $e) blocks remain unaffected.
 *
 * @package MercadoPago\PP\Sdk\Exceptions
 */
class ApiException extends \Exception
{
    /**
     * @var string|null Machine-readable API error code, e.g. "CPP_AT_0103004".
     */
    private $errorCode;

    /**
     * @var int|null HTTP status code echoed inside the response payload body.
     */
    private $apiStatus;

    /**
     * @var string|null Raw backend error chain, e.g. "418 I_AM_A_TEAPOT \"ErrorOrderClientCreateRequest | errors: [...]\"".
     */
    private $originalMessage;

    /**
     * @param string      $message         Human-readable message from the `message` field of the response payload.
     * @param string|null $errorCode        Machine-readable code from the `error` field (CPP_AT_*).
     * @param int|null    $apiStatus        HTTP status from the `status` field of the payload body.
     * @param string|null $originalMessage  Raw error chain from the `original_message` field.
     */
    public function __construct(
        string $message,
        ?string $errorCode = null,
        ?int $apiStatus = null,
        ?string $originalMessage = null
    ) {
        parent::__construct($message);
        $this->errorCode       = $errorCode;
        $this->apiStatus       = $apiStatus;
        $this->originalMessage = $originalMessage;
    }

    /**
     * Returns the API error code (e.g. "CPP_AT_0103004"), or null when the response did not include one.
     *
     * @return string|null
     */
    public function getErrorCode(): ?string
    {
        return $this->errorCode;
    }

    /**
     * Returns the HTTP status code echoed inside the payload body, or null when absent.
     *
     * @return int|null
     */
    public function getApiStatus(): ?int
    {
        return $this->apiStatus;
    }

    /**
     * Returns the raw backend error chain from `original_message`, or null when absent.
     * Useful for server-side logging and debugging — should never be displayed to end users.
     *
     * @internal
     * @return string|null
     */
    public function getOriginalMessage(): ?string
    {
        return $this->originalMessage;
    }
}
