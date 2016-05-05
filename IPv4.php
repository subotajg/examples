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
