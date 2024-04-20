<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ApiException extends Exception
{
    protected $code;

    protected $message;

    protected ?string $data;

    public function __construct(string $code, string $message, ?string $data = null)
    {
        parent::__construct();
        $this->code = $code;
        $this->message = $message;
        $this->data = $data;
    }

    /**
     * Report the exception.
     */
    public function report(): void
    {
        //
    }

    /**
     * Render the exception as an HTTP response.
     */
    public function render(): JsonResponse
    {
        return response()->json(
            [
                'result' => false,
                'message' => $this->message,
                'data' => $this->data,
            ],
            strlen($this->code) > 3 ? ResponseAlias::HTTP_UNPROCESSABLE_ENTITY : $this->code
        );
    }
}
