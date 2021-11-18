<?php

namespace Bytes\PluralizeBundle\Tests;

use Bytes\PluralizeBundle\Pluralize;
use Generator;
use PHPUnit\Framework\TestCase;

class PluralizeTest extends TestCase
{

    /**
     * @dataProvider provideValues
     * @param $number
     * @param $string
     * @param $expectedFull
     * @param $expected
     */
    public function testGetPluralizedString($number, $string, $expectedFull, $expected)
    {
        $results = Pluralize::pluralize($number, $string, false);
        $this->assertEquals($expected, $results);

        $results = Pluralize::pluralize($number, $string, true);
        $this->assertEquals($expectedFull, $results);
    }

    /**
     * @dataProvider provideValues
     * @dataProvider provideFormattedValues
     * @param $number
     * @param $string
     * @param $expectedFull
     * @param $expected
     */
    public function testGetFormattedPluralizedString($number, $string, $expectedFull, $expected)
    {
        $results = Pluralize::pluralizeFormatted($number, $string);
        $this->assertEquals($expectedFull, $results);
    }

    /**
     * @return Generator
     */
    public function provideValues(): Generator
    {
        yield ['number' => 0, 'string' => 'word', 'expectedFull' => '0 words', 'expected' => 'words'];
        yield ['number' => 1, 'string' => 'word', 'expectedFull' => '1 word', 'expected' => 'word'];
        yield ['number' => 2, 'string' => 'word', 'expectedFull' => '2 words', 'expected' => 'words'];

        yield ['number' => 0, 'string' => 'leaves', 'expectedFull' => '0 leafs', 'expected' => 'leafs'];
        yield ['number' => 1, 'string' => 'leaves', 'expectedFull' => '1 leaf', 'expected' => 'leaf'];
        yield ['number' => 2, 'string' => 'leaves', 'expectedFull' => '2 leafs', 'expected' => 'leafs'];

        yield ['number' => 0, 'string' => 'person', 'expectedFull' => '0 persons', 'expected' => 'persons'];
        yield ['number' => 1, 'string' => 'person', 'expectedFull' => '1 person', 'expected' => 'person'];
        yield ['number' => 2, 'string' => 'person', 'expectedFull' => '2 persons', 'expected' => 'persons'];

        yield ['number' => 0, 'string' => 'people', 'expectedFull' => '0 persons', 'expected' => 'persons'];
        yield ['number' => 1, 'string' => 'people', 'expectedFull' => '1 person', 'expected' => 'person'];
        yield ['number' => 2, 'string' => 'people', 'expectedFull' => '2 persons', 'expected' => 'persons'];
    }

    /**
     * @return Generator
     */
    public function provideFormattedValues(): Generator
    {
        yield ['number' => 1000, 'string' => 'people', 'expectedFull' => '1,000 persons', 'expected' => 'persons'];
        yield ['number' => 1001, 'string' => 'people', 'expectedFull' => '1,001 persons', 'expected' => 'persons'];
        yield ['number' => 1010, 'string' => 'people', 'expectedFull' => '1,010 persons', 'expected' => 'persons'];
    }
}