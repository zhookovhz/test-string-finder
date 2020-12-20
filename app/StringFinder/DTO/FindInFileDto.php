<?php

namespace App\StringFinder\DTO;

class FindInFileDto
{
    /**
     * @var string
     */
    private string $search;
    /**
     * @var string
     */
    private string $filename;

    /**
     * FindInFileDto constructor.
     * @param string $search
     * @param string $filename
     */
    public function __construct(
        string $search,
        string $filename
    )
    {
        $this->search = $search;
        $this->filename = $filename;
    }

    /**
     * @return string
     */
    public function getSearch(): string
    {
        return $this->search;
    }

    /**
     * @return string
     */
    public function getFilename(): string
    {
        return $this->filename;
    }
}