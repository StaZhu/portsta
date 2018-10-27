<?php
/* Ip Address Segment and Port Segment */
$portScan = new Porsta('xxx.xxx.xxx.xxx','yyy.yyy.yyy.yyy',range(80,443)); 
$portScan->start();

class Porsta {
    public $ip;
    public $port;

    public function __construct($begin, $end, $port){
        $this->ip = $this->generate($begin, $end);
        $this->port = $port;
    }

    public function start() {
        foreach($this->ip as $ip) {
            foreach($this->port as $port) {
                $fp = @fsockopen($ip, $port, $errno, $errstr, 0.01);
                if ($fp) {
                    echo "{$ip}:{$port} opened\n";
                    // if($port == 80) exec("open 'http://{$ip}:{$port}'");
                } else {
                    echo "{$ip}:{$port} closed\n";
                } 
            }
        }
    }

    /* IP Segment Generator */
    public function generate($begin,$end) {
        $begin = explode('.',$begin);
        $end = explode('.',$end);
        
        while($begin[0] > $end[0]) {
            echo "Error Input!\n";
            break 1;
        }
        while($begin[0] < $end[0]){
            while ($begin[1] > 255) {
                echo "Error Input!\n";
                break 2;
            }
            while ($begin[1] <= 255) {
                while ($begin[2] > 255) {
                    echo "Error Input!\n";
                    break 3;
                }
                while ($begin[2] <= 255) {
                    while ($begin[3] > 255) {
                        echo "Error Input!\n";
                        break 4;
                    }
                    while ($begin[3] <= 255) {
                        yield "{$begin[0]}.{$begin[1]}.{$begin[2]}.{$begin[3]}";
                        $begin[3]++;
                    }
                    $begin[3] = '0';
                    $begin[2]++;
                }
                $begin[2] = '0';
                $begin[1]++;
            }
            $begin[1] = '0';
            $begin[0]++; 
        }
        while($begin[0] == $end[0]) {
            while ($begin[1] > $end[1]) {
                echo "Error Input!\n";
                break 2;
            }
            while ($begin[1] < $end[1]) {
                while ($begin[2] > 255) {
                    echo "Error Input!\n";
                    break 3;
                }
                while ($begin[2] <= 255) {
                    while ($begin[3] > 255) {
                        echo "Error Input!\n";
                        break 4;
                    }
                    while ($begin[3] <= 255) {
                        yield "{$begin[0]}.{$begin[1]}.{$begin[2]}.{$begin[3]}";
                        $begin[3]++;
                    } 
                    $begin[3] = '0';
                    $begin[2]++;  
                }
                $begin[2] = '0';
                $begin[1]++;  
            } 
            while($begin[1] == $end[1]) {
                while ($begin[2] > $end[2]) {
                    echo "Error Input!\n";
                    break 3;
                }
                while ($begin[2] < $end[2]) {
                    while ($begin[3] > 255) {
                        echo "Error Input!\n";
                        break 4;
                    }
                    while ($begin[3] <= 255) {
                        yield "{$begin[0]}.{$begin[1]}.{$begin[2]}.{$begin[3]}";
                        $begin[3]++;
                    } 
                    $begin[3] = '0';
                    $begin[2]++;  
                }
                while ($begin[2] = $end[2]) {
                    while ($begin[3] > $end[3]) {
                        echo "Error Input!\n";
                        break 4;
                    }
                    while ($begin[3] < $end[3]) {
                        yield "{$begin[0]}.{$begin[1]}.{$begin[2]}.{$begin[3]}";
                        $begin[3]++;
                    } 
                    while ($begin[3] = $end[3]) {
                        yield "{$begin[0]}.{$begin[1]}.{$begin[2]}.{$begin[3]}";
                        break 4;
                    } 
                }
                $begin[2] = '0';
                $begin[1]++;
            }
            $begin[1] = '0';
            $begin[0]++;
        }
    }   
}
?>