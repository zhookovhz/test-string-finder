<?php

namespace App\FileReader\Exceptions;

use Exception;

class FIleNotOpenException extends Exception
{
    protected $message = 'File not open';
}