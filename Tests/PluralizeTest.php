<?php

namespace Bytes\PluralizeBundle\Tests;

use Bytes\PluralizeBundle\Pluralize;
use PHPUnit\Framework\TestCase;

class PluralizeTest extends TestCase
{

    /**
     * @dataProvider provideValues
     * @param $number
     * @param $string
     * @param $expected
     */
    public function testGetPluralizedString($number, $string, $expectedFull, $expected)
    {
        $results = Pluralize::pluralize($number, $string, false);
        $this->assertEquals($expected, $results);

        $results = Pluralize::pluralize($number, $string, true);
        $this->assertEquals($expectedFull, $results);
    }

    public function provideValues()
    {
        yield['number' => 0, 'string' => 'word', 'expectedFull' => '0 words', 'expected' => 'words'];
        yield['number' => 1, 'string' => 'word', 'expectedFull' => '1 word', 'expected' => 'word'];
        yield['number' => 2, 'string' => 'word', 'expectedFull' => '2 words', 'expected' => 'words'];

        yield['number' => 0, 'string' => 'leaves', 'expectedFull' => '0 leafs', 'expected' => 'leafs'];
        yield['number' => 1, 'string' => 'leaves', 'expectedFull' => '1 leaf', 'expected' => 'leaf'];
        yield['number' => 2, 'string' => 'leaves', 'expectedFull' => '2 leafs', 'expected' => 'leafs'];

        yield['number' => 0, 'string' => 'person', 'expectedFull' => '0 persons', 'expected' => 'persons'];
        yield['number' => 1, 'string' => 'person', 'expectedFull' => '1 person', 'expected' => 'person'];
        yield['number' => 2, 'string' => 'person', 'expectedFull' => '2 persons', 'expected' => 'persons'];

        yield['number' => 0, 'string' => 'people', 'expectedFull' => '0 persons', 'expected' => 'persons'];
        yield['number' => 1, 'string' => 'people', 'expectedFull' => '1 person', 'expected' => 'person'];
        yield['number' => 2, 'string' => 'people', 'expectedFull' => '2 persons', 'expected' => 'persons'];
    }
}
