<?php

namespace Holiday\Model;

abstract class AbstractHoliday implements HolidayInterface
{
	const TIME_ZONE = 'Europe/Paris';
	
    const MONDAY    = 'Monday';
    const TUESDAY   = 'Tuesday';
    const WEDNESDAY = 'Wednesday';
    const THURSDAY  = 'Thursday';
    const FRIDAY    = 'Friday';
    const SATURDAY  = 'Saturday';
    const SUNDAY    = 'Sunday';

    const FILTER_MODE_INCLUSION = 'INCLUSION';
    const FILTER_MODE_EXCLUSION = 'EXCLUSION';

    public static function getEasterDate($year)
    {
        $easter = new \DateTime('@' . easter_date($year));
        $easter->setTimezone(new \DateTimeZone(self::TIME_ZONE));

        return  $easter ;
    }

    public static function getEasterMonday($year)
    {
        return self::getEasterDate($year)->add(new \DateInterval('P1D'));
    }

    public static function getAscensionDay($year)
    {
        return self::getEasterDate($year)->add(new \DateInterval('P39D'));
    }

    public static function getWitmonday($year)
    {
        return self::getEasterDate($year)->add(new \DateInterval('P50D'));
    }

    public static function isClosedDay($year, \Datetime $day)
    {
        $holidays = static::getHolidays($year);
        return in_array($day, $holidays) ? true : false  ;
    }

    public static function getFilteredHolidays($year, array $filters, $mode = self::FILTER_MODE_EXCLUSION)
    {
        $holidays        = static::getHolidays($year);
        $cleanedHolidays = [];
        foreach ($holidays as $holiday) {
            if ($mode === self::FILTER_MODE_EXCLUSION) {
                if (!in_array($holiday->format('l'), $filters)) {
                    $cleanedHolidays [] = $holiday;
                }
            } else {
                if (in_array($holiday->format('l'), $filters)) {
                    $cleanedHolidays [] = $holiday;
                }
            }
        }

        return $cleanedHolidays;
    }
}
