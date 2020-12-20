<?php

namespace App\FileReader;

use App\FileReader\Exceptions\CanNotReadFileException;
use App\FileReader\Exceptions\FIleNotOpenException;

class FileReader
{
    /**
     * @var resource
     */
    protected $handle;

    public function __destruct()
    {
        $this->close();
    }

    /**
     * Открыть поток
     * @param string $filename
     * @throws CanNotReadFileException
     */
    public function open(string $filename)
    {
        $this->handle = fopen($filename, 'r');

        if (!$this->handle) {
            throw new CanNotReadFileException();
        }
    }

    /**
     * Закрыть поток
     * @return bool
     */
    public function close(): bool
    {
        return fclose($this->handle);
    }

    /**
     * @return false|string
     * @throws FIleNotOpenException
     */
    public function getString()
    {
        $this->checkForOpen();

        return  fgets($this->handle);
    }

    /**
     * @return false|int
     * @throws FIleNotOpenException
     */
    public function getPointerPosition()
    {
        $this->checkForOpen();

        return ftell($this->handle);
    }

    /**
     * Проверка на наличие открытого потока
     * @throws FIleNotOpenException
     */
    protected function checkForOpen()
    {
        if (!$this->handle) {
            throw new FIleNotOpenException();
        }
    }
}