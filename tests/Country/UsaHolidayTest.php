<?php
namespace Holiday\tests\Country;

use Holiday\Model\AbstractHoliday;
use Holiday\Country\UsaHoliday;

class UsaHolidayTest extends \PHPUnit_Framework_TestCase
{
    private static $expectedHolidays ;
    
    private static $year;
    
    private static $processedHolidays;
    
    private static $processedHolidaysString;
    
    public static function setUpBeforeClass()
    {
        self::$year                     =2016 ;
        self::$expectedHolidays         = [
            new \DateTime(sprintf('%d-%d-%d', self::$year, 1, 1)),
            new \DateTime(sprintf('%d-%d-%d', self::$year, 1, 18)),
            new \DateTime(sprintf('%d-%d-%d', self::$year, 3, 27)),
            new \DateTime(sprintf('%d-%d-%d', self::$year, 5, 30)),
            new \DateTime(sprintf('%d-%d-%d', self::$year, 7, 4)),
            new \DateTime(sprintf('%d-%d-%d', self::$year, 9, 5)),
            new \DateTime(sprintf('%d-%d-%d', self::$year, 11, 11)),
            new \DateTime(sprintf('%d-%d-%d', self::$year, 11, 24)),
            new \DateTime(sprintf('%d-%d-%d', self::$year, 12, 24)),
            new \DateTime(sprintf('%d-%d-%d', self::$year, 12, 26)),
            new \DateTime(sprintf('%d-%d-%d', self::$year, 12, 31)),
        ];
        
        self::$processedHolidays               = UsaHoliday::getHolidays(self::$year);
        self::$processedHolidaysString         = array_map(function ($holiday) {
            return $holiday->format('y-m-d') ;
        }, self::$processedHolidays);
    }

    
    public function testUsaHolidays()
    {
        foreach (self::$expectedHolidays as $expectedHoliday) {
            $this->assertTrue(in_array($expectedHoliday->format('y-m-d'), self::$processedHolidaysString), $expectedHoliday->format('y-m-d').' is expected to be holiday.');
        }
    }
    
    
    public function testClosedDaysUsa()
    {
        $processedHolidays               = UsaHoliday::getHolidays(self::$year);
        $processedHolidaysString         = array_map(function ($holiday) {
            return $holiday->format('y-m-d') ;
        }, $processedHolidays);
        
        foreach ($processedHolidaysString as $processedHoliday) {
            $this->assertTrue(UsaHoliday::isClosedDay(new \DateTime($processedHoliday)));
        }
    }
}
