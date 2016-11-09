<?php

namespace Holiday;

interface iHoliday
{
    public static function getHolidays($year = null);
    public static function isClosedDay($year, \Datetime $day);
}
