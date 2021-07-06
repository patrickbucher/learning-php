<?php

$start = DateTime::createFromFormat('Y-m-d', '1970-01-01');
$later = clone $start;

// add a Period (P) of 12 years (12Y), 5 months (5M) and 3 days (3D)
$later->add(new DateInterval('P12Y5M3D')); // changes date in-place!
echo($later->format('Y-m-d') . PHP_EOL);

$diff = $later->diff($start);
echo($diff->format('is %y years, %m months, %d days (total: %a days) later') . PHP_EOL);

if ($later > $start) {
    echo($later->format('Y-m-d') . ' is later than ' . $start->format('Y-m-d'));
}
