<?php

/**
 * Transfrom CIDR (IP v4) notation e.g. 82.117.206.176/29
 * to array of Ips
 *
 * @param string $cidr
 * @return array
 */
function getEachIpInRange($cidr) {
    $ips = array();
    $range = array();

    $cidr = explode('/', $cidr);
    $range['firstIP'] = (ip2long($cidr[0])) & ((-1 << (32 - (int)$cidr[1])));
    $range['lastIP'] = (ip2long($cidr[0])) + pow(2, (32 - (int)$cidr[1])) - 1;

    for ($ip = $range['firstIP']; $ip <= $range['lastIP']; $ip++) {
        $ips[] = long2ip($ip);
    }
    return $ips;
}

print_r(getEachIpInRange('82.117.206.176/29'));

/*
E.g.
$ php test.php 
Array
(
    [0] => 82.117.206.176
    [1] => 82.117.206.177
    [2] => 82.117.206.178
    [3] => 82.117.206.179
    [4] => 82.117.206.180
    [5] => 82.117.206.181
    [6] => 82.117.206.182
    [7] => 82.117.206.183
)
*/
