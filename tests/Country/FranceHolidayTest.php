<?php
namespace Holiday\Tests\Country;

use Holiday\Model\AbstractHoliday;
use Holiday\Country\FranceHoliday;

class FrancehHolidayTest extends \PHPUnit_Framework_TestCase
{
    public function testFranceHolidays()
    {
        $year             = 2016;
        $expectedHolidays = [
            new \DateTime(sprintf('%d-%d-%d', $year, 3, 28)),
            new \DateTime(sprintf('%d-%d-%d', $year, 5, 5)),
            new \DateTime(sprintf('%d-%d-%d', $year, 5, 16)),
            new \DateTime(sprintf('%d-%d-%d', $year, 1, 1)),
            new \DateTime(sprintf('%d-%d-%d', $year, 5, 1)),
            new \DateTime(sprintf('%d-%d-%d', $year, 5, 8)),
            new \DateTime(sprintf('%d-%d-%d', $year, 7, 14)),
            new \DateTime(sprintf('%d-%d-%d', $year, 8, 15)),
            new \DateTime(sprintf('%d-%d-%d', $year, 11, 01)),
            new \DateTime(sprintf('%d-%d-%d', $year, 11, 11)),
            new \DateTime(sprintf('%d-%d-%d', $year, 12, 25)),
        ];

        $processedHolidays       = FranceHoliday::getHolidays($year);
        $processedHolidaysString = array_map(function ($holiday) {
            return $holiday->format('y-m-d') ;
        }, $processedHolidays);
        
        foreach ($expectedHolidays as $expectedHoliday) {
            $this->assertTrue(in_array($expectedHoliday->format('y-m-d'), $processedHolidaysString), $expectedHoliday->format('y-m-d').' is expected to be holiday.');
        }
    }
    
    
     public function testClosedDaysFrance() {
     	$this->assertTrue( FranceHoliday::isClosedDay(new \DateTime(sprintf('%d-%d-%d', 2016, 3, 28))));
     	$this->assertTrue( FranceHoliday::isClosedDay(new \DateTime(sprintf('%d-%d-%d', 2016, 12, 25)))); 
     	
     }
    
}
