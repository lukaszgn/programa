<?php
namespace App\Tests\Utils;

use App\Utils\NaturalNumbersCalculator;
use PHPUnit\Framework\TestCase;

class NaturalNumbersCalculatorTest extends TestCase
{
    public function testNumberCalculation()
    {
        $calculator = new NaturalNumbersCalculator();
        $calculator->addNumber(4);
        $calculator->addNumber(8);
        $calculator->addNumber(11);
        $calculator->addNumber(7);
        
        $result = $calculator->calculateNumbers();
        $this->assertEquals(NaturalNumbersCalculator::EQUAL, $result);
        
        $calculator->addNumber(2);
        $result = $calculator->calculateNumbers();
        $this->assertEquals(NaturalNumbersCalculator::GREATER, $result);
        
        $calculator->addNumber(5);
        $result = $calculator->calculateNumbers();
        $this->assertEquals(NaturalNumbersCalculator::LESSER, $result);
    }
}