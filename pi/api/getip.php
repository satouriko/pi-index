<?php
$hostname = exec("hostname -I");
$ips = explode(" ", $hostname);
$ipv = $_REQUEST["ipv"];
if($ipv == "v6")
{
    if(count($ips) > 1)
        echo $ips[1];
    else
        echo $ips[0];
}
else
    echo $ips[0];
