# MyErrorHandler Package

MyErrorHandler is a custom error handler package for PHP that provides a visually appealing error display similar to Whoops. It includes features like displaying error details, stack trace, and handling exceptions with a clean and customizable design. its not full feature but it is a good start for small project. 

## Notes

This project serves as a learning exercise for creating a Composer package, and as such, may contain a few bugs as it is intended for practice purposes.

## Installation

Install the package using [Composer](https://getcomposer.org/):

```bash
composer require viragrajput/my-error-handler-package
```

## Usage

### 1. Autoloading Configuration

Make sure your project's Composer autoloader is set up to load the package. Add the following to your `composer.json` file:

```json
{
    "autoload": {
        "psr-4": {
            "MyErrorHandler\\": "src/"
        }
    }
}
```

Run the following command to regenerate the autoloader files:

```bash
composer dump-autoload
```

### 2. Include Composer Autoloader

Include the Composer autoloader in your project's bootstrap file or entry point:

```php
require_once 'vendor/autoload.php';
```

### 3. Set Up Error Handling

In your application's initialization code, set up the custom error handler:

```php
use MyErrorHandler\ErrorHandler;

set_error_handler([ErrorHandler::class, 'handle']);

// Other framework initialization code
```

### 4. Triggering Errors

Trigger errors in your application code to test the custom error handler:

```php
// Your application code

// Trigger a user error for testing
trigger_error('This is a test user error', E_USER_ERROR);
```

### 5. Displaying Errors

Ensure that your project is configured to display errors during development. Adjust your `php.ini` configuration or use `error_reporting` and `ini_set` functions:

```php
// Your project's development config
ini_set('display_errors', 1);
error_reporting(E_ALL);
```

### 6. Handle Exceptions

If your custom error handler also handles exceptions, set up a global exception handler in your project:

```php
// Your project's bootstrap file

use MyErrorHandler\PrettyException;

set_exception_handler(function (\Throwable $exception) {
    echo new PrettyException($exception->getMessage(), 0, $exception);
});

// Other framework initialization code
```

## Contributing

Contributions are welcome! Feel free to submit issues or pull requests.

## License

This package is open-sourced software licensed under the [MIT license](LICENSE).
