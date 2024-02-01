<?php

namespace MyErrorHandler;

class PrettyException extends \Exception
{
    protected $errorType;

    public function __construct($message = "", $code = 0, \Throwable $previous = null, $errorType = 0)
    {
        parent::__construct($message, $code, $previous);
        $this->errorType = $errorType;
    }

    public function __toString()
    {
        return $this->render();
    }

    public function render()
    {
        $html = '<div style="font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; padding: 1em; color: #333; background-color: #fff; border-radius: 5px; border: 1px solid #ccc; margin: 20px;">';
        $html .= '<style>body {margin: 0; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;} div {margin: 0 auto; max-width: 800px; padding: 20px;}</style>';
        $html .= '<h2 style="color: #d9534f;">Error Details:</h2>';
        $html .= '<p><strong>Type:</strong> ' . get_class($this) . '</p>';
        $html .= '<p><strong>Message:</strong> ' . $this->getMessage() . '</p>';
        $html .= '<p><strong>Code:</strong> ' . $this->getCode() . '</p>';
        $html .= '<p><strong>File:</strong> ' . $this->getFile() . '</p>';
        $html .= '<p><strong>Line:</strong> ' . $this->getLine() . '</p>';
        $html .= '<p><strong>Error Type:</strong> ' . $this->errorType . '</p>';

        // Display stack trace
        $html .= '<h3 style="color: #d9534f;">Stack Trace:</h3>';
        $html .= '<pre style="background-color: #f9f9f9; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 0.85em;">';
        $html .= htmlspecialchars($this->getTraceAsString());
        $html .= '</pre>';

        // Display previous exceptions
        if ($this->getPrevious()) {
            $html .= '<h3 style="color: #d9534f;">Previous Exception:</h3>';
            $html .= '<pre style="background-color: #f9f9f9; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 0.85em;">';
            $html .= htmlspecialchars($this->getPrevious()->getTraceAsString());
            $html .= '</pre>';
        }

        $html .= '</div>';

        return $html;
    }
}
