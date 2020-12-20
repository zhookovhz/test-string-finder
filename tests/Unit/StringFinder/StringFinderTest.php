<?php


namespace Tests\Unit\StringFinder;

use App\FileReader\FileReader;
use App\StringFinder\DTO\FindInFileDto;
use App\StringFinder\StringFinder;
use PHPUnit\Framework\TestCase;

class StringFinderTest extends TestCase
{
    protected const RETURN_STRING = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit';
    protected const SEARCH_STRING = 'ipsum';
    protected const EXPECT_LINE = 1;
    protected const EXPECT_COLUMN = 7;
    protected const FILE_NAME = 'filename';

    public function testFindInFile()
    {
        $finder = new StringFinder(
            $this->buildFileReaderMock()
        );

        $result = $finder->findInFile(
            new FindInFileDto(
                self::SEARCH_STRING,
                self::FILE_NAME
            )
        );

        $this->assertEquals(self::EXPECT_LINE, $result->getLine());
        $this->assertEquals(self::EXPECT_COLUMN, $result->getColumn());
    }

    protected function buildFileReaderMock()
    {
        $fileReader = $this->createMock(FileReader::class);
        $fileReader->method('getString')->willReturn(self::RETURN_STRING);
        $fileReader->method('getPointerPosition')->willReturn(self::EXPECT_LINE);

        return $fileReader;
    }
}