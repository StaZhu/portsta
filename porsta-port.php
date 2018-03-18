<?php

$ip = [
    0 => 10,
    1 => 170,
    2 => range(62,255,1),
    3 => range(0,255,1),
];

$open = "打开";
//$port = range(0,10000,1);
$port = [80];

for($i = 0;$i < sizeof($ip[2]);$i++){
    for($j = 0;$j < sizeof($ip[3]);$j++){
        $remoteip="{$ip[0]}.{$ip[1]}.{$ip[2][$i]}.{$ip[3][$j]}";
        for ($k = 0; $k < sizeof($port); $k++) {
            $fp = @fsockopen($remoteip, $port[$k], $errno, $errstr, 1);
            if ($fp) {
                echo "{$remoteip}:{$port[$k]} {$open}";
                echo "\n";
                shell_exec("open 'http://{$remoteip}:{$port[$k]}'");
            } else {
                continue;
            } 
        }
    }
}

?>