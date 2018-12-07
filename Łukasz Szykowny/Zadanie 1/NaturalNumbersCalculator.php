<?php
namespace App\Utils;

/*
 * Class used to calculate natural numbers relations
 */
class NaturalNumbersCalculator
{
    const LESSER = -1;
    const EQUAL = 0;
    const GREATER = 1;
    
	private $numbers = array();
    
    /*
     * Add new number to numbers array
     */
	public function addNumber(int $number)
    {
        $this->numbers[] = $number;
    }
    
    /*
     * Clear numbers array
     */
	public function clear()
    {
        $numbers = array();
    }
    
    /*
     * Determines whether we have a higher value of even or odd numbers
     * 
     * Return:
     * integer - comparison result
     */
	public function calculateNumbers(): int
    {
		$evenNumbersSum = 0;
		$oddNumbersSum = 0;
        
		foreach($this->numbers as $number)
        {
            if($number%2 == 0)
                $evenNumbersSum = $evenNumbersSum + $number;
            else
                $oddNumbersSum = $oddNumbersSum + $number;
        }
		
        return 3 * $evenNumbersSum <=> 2 * $oddNumbersSum;
	}
}