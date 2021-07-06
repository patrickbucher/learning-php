<?php

$start = DateTime::createFromFormat('Y-m-d', '2020-01-01');
$later = DateTime::createFromFormat('Y-m-d', '2020-02-01');
$periodInterval = DateInterval::createFromDateString('first thursday');
$periodIterator = new DatePeriod($start, $periodInterval, $later, DatePeriod::EXCLUDE_START_DATE);
foreach ($periodIterator as $date) {
    echo($date->format('Y-m-d') . PHP_EOL);
}
