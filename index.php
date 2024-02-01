<?php

// MyErrorHandler/index.php

require_once 'vendor/autoload.php';

use MyErrorHandler\ErrorHandler;
use MyErrorHandler\PrettyException;

set_error_handler([ErrorHandler::class, 'handle']);


// Your application code goes here
// throw new \Exception('Hello World!');
trigger_error('This is a test user error', E_USER_ERROR);
