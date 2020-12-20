<?php


namespace App\StringFinder\DTO;


class LineColumnDto
{
    private int $line;
    private int $column;

    public function __construct(
        int $line,
        int $column
    )
    {
        $this->line = $line;
        $this->column = $column;
    }

    /**
     * @return int
     */
    public function getLine(): int
    {
        return $this->line;
    }

    /**
     * @return int
     */
    public function getColumn(): int
    {
        return $this->column;
    }
}