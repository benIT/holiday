<?php
namespace Holiday\tests;

use Holiday\Model\AbstractHoliday;
use Holiday\FrenchHoliday;

class FrenchHolidayTest extends \PHPUnit_Framework_TestCase
{
    public function testFrenchHolidays()
    {
        $year            = 2016;
        $expectedHoliday = [
            new \DateTime(sprintf('%d-%d-%d', $year, 3, 28)),
            new \DateTime(sprintf('%d-%d-%d', $year, 5, 5)),
            new \DateTime(sprintf('%d-%d-%d', $year, 5, 16)),
            new \DateTime(sprintf('%d-%d-%d', $year, 1, 1)), // 1er janvier
            new \DateTime(sprintf('%d-%d-%d', $year, 5, 1)), // Fête du travail
            new \DateTime(sprintf('%d-%d-%d', $year, 5, 8)),  // Victoire des alliés
            new \DateTime(sprintf('%d-%d-%d', $year, 7, 14)),  // Fête nationale
            new \DateTime(sprintf('%d-%d-%d', $year, 8, 15)),  // Assomption
            new \DateTime(sprintf('%d-%d-%d', $year, 11, 01)),  // Toussaint
            new \DateTime(sprintf('%d-%d-%d', $year, 11, 11)),  // Armistice
            new \DateTime(sprintf('%d-%d-%d', $year, 12, 25)),  // Noel
        ];
        $holidays       = FrenchHoliday::getHolidays($year);
        $holidaysString = array_map(function ($holiday) {
            return $holiday->format('y-m-d') ;
        }, $holidays);
        
        foreach ($holidays as $holiday) {
            $this->assertTrue(in_array($holiday->format('y-m-d'), $holidaysString), $holiday->format('y-m-d').'is not expected to be holiday.');
        }
    }
}
