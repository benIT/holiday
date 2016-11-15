<?php
namespace Holiday\Tests\Country;

use Holiday\Model\AbstractHoliday;
use Holiday\Country\UsaHoliday;

class UsaHolidayTest extends \PHPUnit_Framework_TestCase
{
    public function testUsHolidays()
    {
        $year             = 2016;
        $expectedHolidays = [
            new \DateTime(sprintf('%d-%d-%d', $year, 1, 1)),
            new \DateTime(sprintf('%d-%d-%d', $year, 1, 18)),
            new \DateTime(sprintf('%d-%d-%d', $year, 3, 27)),
            new \DateTime(sprintf('%d-%d-%d', $year, 5, 30)),
            new \DateTime(sprintf('%d-%d-%d', $year, 7, 4)),
            new \DateTime(sprintf('%d-%d-%d', $year, 9, 5)),
            new \DateTime(sprintf('%d-%d-%d', $year, 11, 11)),
            new \DateTime(sprintf('%d-%d-%d', $year, 11, 24)),
            new \DateTime(sprintf('%d-%d-%d', $year, 12, 24)),
            new \DateTime(sprintf('%d-%d-%d', $year, 12, 26)),
            new \DateTime(sprintf('%d-%d-%d', $year, 12, 31)),
        ];
        $processedHolidays       = UsaHoliday::getHolidays($year);
        $processedHolidaysString = array_map(function ($holiday) {
            return $holiday->format('y-m-d') ;
        }, $processedHolidays);
        
        foreach ($expectedHolidays as $expectedHoliday) {
            $this->assertTrue(in_array($expectedHoliday->format('y-m-d'), $processedHolidaysString), $expectedHoliday->format('y-m-d').' is expected to be holiday.');
        }
    }
}
