<?php

$open = "打开";
$port = range(0,10000,1);

$remoteip="10.170.72.254";

for ($k = 0; $k < sizeof($port); $k++) {
    $fp = @fsockopen($remoteip, $port[$k], $errno, $errstr, 1);
    if ($fp) {
        echo "{$remoteip}:{$port[$k]} {$open}";
        echo "\n";
    } else {
        continue;
    } 
}

?>