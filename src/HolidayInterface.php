<?php

namespace Holiday;

interface HolidayInterface
{
    public static function getHolidays($year = null);
    public static function isClosedDay($year, \Datetime $day);
}
