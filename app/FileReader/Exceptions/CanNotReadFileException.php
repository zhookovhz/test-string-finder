<?php

namespace App\FileReader\Exceptions;

use Exception;

class CanNotReadFileException extends Exception
{
    protected $message = 'Can\'t read the file!';
}