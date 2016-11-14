<?php
namespace Holiday;

use Holiday\Model\AbstractHoliday;

class UsHoliday extends AbstractHoliday
{
	
    public static function getHolidays($year = null)
    {
    	//@see http://www.theholidayschedule.com/banks/us-bank-holidays.php
        $year === null ? $year = intval(date('Y')) : $year = intval($year);
        $holidays              = [
            new \DateTime(sprintf('%d-%d-%d', $year, 1, 1)),
            new \DateTime(sprintf('%d-%d-%d', $year, 1, 18)),
            parent::getEasterDate($year),
            new \DateTime(sprintf('%d-%d-%d', $year, 5, 30)),
            new \DateTime(sprintf('%d-%d-%d', $year, 7, 4)),
            new \DateTime(sprintf('%d-%d-%d', $year, 9, 5)),
            new \DateTime(sprintf('%d-%d-%d', $year, 11, 11)),
            new \DateTime(sprintf('%d-%d-%d', $year, 11, 24)),
            new \DateTime(sprintf('%d-%d-%d', $year, 12, 24)),
            new \DateTime(sprintf('%d-%d-%d', $year, 12, 26)),
            new \DateTime(sprintf('%d-%d-%d', $year, 12, 31)),

        ];

        sort($holidays);

        return $holidays;
    }
}
