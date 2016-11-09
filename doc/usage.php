<?php

require __DIR__.'/../vendor/autoload.php';
use Holiday\Holiday;
use Holiday\FrenchHoliday;

const NUMBER_OF_YEAR_TO_PROCESS = 50;

echo '<html><body><pre>';

echo '<h2>Check if a day if holiday</h2>';
var_dump(FrenchHoliday::isClosedDay(2016, new \DateTime(sprintf('%d-%d-%d', 2016, 1, 1))));

echo '<h2>Find the holidays for the current year</h2>';
var_dump(FrenchHoliday::getHolidays());

echo '<h2>Find the holidays for the a given year</h2>';
var_dump(FrenchHoliday::getHolidays(2012));

echo sprintf('<h2>Find the holidays that are nor %s nor %s </h2>', Holiday::SATURDAY, Holiday::SUNDAY);
for ($i = intval(date('Y')); $i <= date('Y') + NUMBER_OF_YEAR_TO_PROCESS; ++$i) {
    echo '<h2>'.$i.'</h2>';
    $holidayFiltered = FrenchHoliday::getFilteredHolidays($i, [Holiday::SATURDAY, Holiday::SUNDAY]);
    foreach ($holidayFiltered as $d) {
        echo $d->format('l d-m-y').'<br>';
    }
}
