<?php
/* Port Segment*/
$port = range(80,443,1);
/* Ip Address */
$remoteip="xxx.xxx.xxx.xxx";

for ($k = 0; $k < sizeof($port); $k++) {
    $fp = @fsockopen($remoteip, $port[$k], $errno, $errstr, 0.01);
    if ($fp) {
        echo "{$remoteip}:{$port[$k]} opened\n";
    } else {
        continue;
    } 
}
?>
