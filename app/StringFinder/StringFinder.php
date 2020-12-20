<?php

namespace App\StringFinder;

use App\FileReader\Exceptions\CanNotReadFileException;
use App\FileReader\Exceptions\FIleNotOpenException;
use App\FileReader\FileReader;
use App\StringFinder\DTO\FindInFileDto;
use App\StringFinder\DTO\LineColumnDto;

class StringFinder
{
    protected FileReader $fileReader;

    public function __construct(FileReader $fileReader)
    {
        $this->fileReader = $fileReader;
    }

    /**
     * Поиск вхождения строки в файле
     * @param FindInFileDto $dto
     * @return LineColumnDto|null
     * @throws FIleNotOpenException
     * @throws CanNotReadFileException
     */
    public function findInFile(FindInFileDto $dto): ?LineColumnDto
    {
        $this->fileReader->open($dto->getFilename());

        $search = null;

        while (($string = $this->fileReader->getString()) !== false) {

            $column = $this->findColumn($string, $dto->getSearch());

            if ($column !== false) {
                $search = new LineColumnDto(
                    $this->findLine(),
                    $column
                );

                break;
            }
        }

        $this->fileReader->close();

        return $search;
    }

    /**
     * Вернуть номер строки
     * @return false|int
     * @throws FIleNotOpenException
     */
    protected function findLine()
    {
        return $this->fileReader->getPointerPosition();
    }

    /**
     * Поиск вхождения в строку
     * @param string $haystack
     * @param string $needle
     * @return false|int
     */
    protected function findColumn(string $haystack, string $needle)
    {
        $offset = mb_strpos($haystack, $needle);

        if ($offset !== false) {
            $offset++;
        }

        return $offset;
    }

}