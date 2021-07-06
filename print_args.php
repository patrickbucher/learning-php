<?php

$i = 0;
while ($i < $argc) {
    echo("Argument " . $i . " is " . $argv[$i] . PHP_EOL);
    $i++;
}
exit(0);
