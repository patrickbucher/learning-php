<?php

$eu_date = '24.06.1987';
$date = DateTime::createFromFormat('d.m.Y', $eu_date);
$us_date = $date->format('Y-m-d');
echo($us_date . PHP_EOL);
