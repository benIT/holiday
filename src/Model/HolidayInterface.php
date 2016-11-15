<?php

namespace Holiday\Model;

interface HolidayInterface
{
    public static function getHolidays($year = null);
    public static function isClosedDay(\Datetime $day);
}
