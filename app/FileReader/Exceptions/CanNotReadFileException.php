<?php

namespace App\FileReader\Exceptions;

class CanNotReadFileException extends Exception
{
    protected $message = 'Can\'t read the file!';
}