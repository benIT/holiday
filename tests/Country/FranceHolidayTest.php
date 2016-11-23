<?php
namespace Holiday\tests\Country;

use Holiday\Model\AbstractHoliday;
use Holiday\Country\FranceHoliday;

class FranceHolidayTest extends \PHPUnit_Framework_TestCase
{
    private static $expectedHolidays ;
    
    private static $year;
    
    private static $processedHolidays;
    
    private static $processedHolidaysString;
    
    public static function setUpBeforeClass()
    {
        self::$year                     =2016 ;
        self::$expectedHolidays         = [
            new \DateTime(sprintf('%d-%d-%d',    self::$year, 3, 28)),
            new \DateTime(sprintf('%d-%d-%d',    self::$year, 5, 5)),
            new \DateTime(sprintf('%d-%d-%d',    self::$year, 5, 16)),
            new \DateTime(sprintf('%d-%d-%d',    self::$year, 1, 1)),
            new \DateTime(sprintf('%d-%d-%d',    self::$year, 5, 1)),
            new \DateTime(sprintf('%d-%d-%d',    self::$year, 5, 8)),
            new \DateTime(sprintf('%d-%d-%d',    self::$year, 7, 14)),
            new \DateTime(sprintf('%d-%d-%d',    self::$year, 8, 15)),
            new \DateTime(sprintf('%d-%d-%d',    self::$year, 11, 01)),
            new \DateTime(sprintf('%d-%d-%d',    self::$year, 11, 11)),
            new \DateTime(sprintf('%d-%d-%d',    self::$year, 12, 25)),
        ];
        
        self::$processedHolidays               = FranceHoliday::getHolidays(self::$year);
        self::$processedHolidaysString         = array_map(function ($holiday) {
            return $holiday->format('y-m-d') ;
        }, self::$processedHolidays);
    }

    
    public function testFranceHolidays()
    {
        foreach (self::$expectedHolidays as $expectedHoliday) {
            $this->assertTrue(in_array($expectedHoliday->format('y-m-d'), self::$processedHolidaysString), $expectedHoliday->format('y-m-d').' is expected to be holiday.');
        }
    }
    
    
    public function testClosedDaysFrance()
    {
        $processedHolidays               = FranceHoliday::getHolidays(self::$year);
        $processedHolidaysString         = array_map(function ($holiday) {
            return $holiday->format('y-m-d') ;
        }, $processedHolidays);
        
        foreach ($processedHolidaysString as $processedHoliday) {
            $this->assertTrue(FranceHoliday::isClosedDay(new \DateTime($processedHoliday)));
        }
    }
}
