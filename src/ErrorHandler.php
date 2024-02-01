<?php

namespace MyErrorHandler;

use Symfony\Component\VarDumper\VarDumper;

class ErrorHandler
{
    public static function handle($errorType, $errorMessage, $file, $line)
    {
        if ($errorType === E_USER_ERROR) {
            // Trigger PrettyException for user errors
            $exception = new PrettyException($errorMessage, 0, null,
                $errorType,
                $file,
                $line
            );
            echo $exception;
            exit;
        }

        VarDumper::dump([
            'errorType' => $errorType,
            'errorMessage' => $errorMessage,
            'file' => $file,
            'line' => $line,
        ]);

        // You can customize the response or log the error here
        // For simplicity, we are just dumping the error details using VarDumper
    }
}
