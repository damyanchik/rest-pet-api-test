<?php
declare(strict_types=1);

namespace App\Exceptions;

use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Redirect;

class PetApiExceptionHandler
{
    public static function handle(RequestException $e): object
    {
        $status = 'Nieznany';
        $errorMessage = 'Wystąpił nieznany błąd w trakcie przetwarzania danych.';

        if ($e->hasResponse()) {
            $errorResponse = $e->getResponse();
            $responseContent = json_decode($errorResponse->getBody()->getContents(), true);

            if (isset($responseContent['status']))
                $status = $responseContent['status'];
            if (isset($responseContent['errorMessage']))
                $errorMessage = $responseContent['errorMessage'];
        }
        $status = $status ?? 'Nieznany';
        $errorMessage = $errorMessage ?? 'Wystąpił nieznany błąd w trakcie przetwarzania danych.';

        return Redirect::back()->with('error', $status . '/'. $errorMessage);
    }
}
