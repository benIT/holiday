<?php
namespace Holiday\Helper;

class HolidayHelper
{
    public static function getHolidays($country, $year)
    {
        if (class_exists(sprintf('Holiday\Country\%sHoliday', $country))) {
            return call_user_func_array(sprintf('Holiday\Country\%sHoliday::getHolidays', $country), [$year]);
        } else {
            throw new \InvalidArgumentException(sprintf('%s country does not exist.', $country));
        }
    }
    
    
    public static function isClosedDay($country,  $year, \Datetime $day)
    {
        if (class_exists(sprintf('Holiday\Country\%sHoliday', $country))) {
            return call_user_func_array(sprintf('Holiday\Country\%sHoliday::isClosedDay', $country), [$year, $day]);
        } else {
            throw new \InvalidArgumentException(sprintf('%s country does not exist.', $country));
        }
    }
}
