<?php

namespace Holiday;

class FrenchHoliday extends AbstractHoliday
{
    public static function getHolidays($year = null)
    {
        $year === null ? $year = intval(date('Y')) : $year = intval($year);
        $holidays              = [
            parent::getEasterMonday($year),
            parent::getAscensionDay($year),
            parent::getWitmonday($year),
            new \DateTime(sprintf('%d-%d-%d', $year, 1, 1)), // 1er janvier
            new \DateTime(sprintf('%d-%d-%d', $year, 5, 1)), // Fête du travail
            new \DateTime(sprintf('%d-%d-%d', $year, 5, 8)),  // Victoire des alliés
            new \DateTime(sprintf('%d-%d-%d', $year, 7, 14)),  // Fête nationale
            new \DateTime(sprintf('%d-%d-%d', $year, 8, 15)),  // Assomption
            new \DateTime(sprintf('%d-%d-%d', $year, 11, 01)),  // Toussaint
            new \DateTime(sprintf('%d-%d-%d', $year, 11, 11)),  // Armistice
            new \DateTime(sprintf('%d-%d-%d', $year, 12, 25)),  // Noel
        ];

        sort($holidays);

        return $holidays;
    }
}
