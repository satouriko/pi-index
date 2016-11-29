<?php
header('Access-Control-Allow-Origin:*');
$pwd = $_REQUEST["pwd"];
$ipv = $_REQUEST["ipv"];
if ($pwd == "raspberry") {
    require_once("Db.php");
    $Db = new DB_MYSQL();
    $result = $Db->get_one("select max(id) from `ip`");
    $maxid = $result["max(id)"];
    $newip = $Db->get_one("select `ip` from `ip` where `id`=$maxid");
    $ips = explode(":", $newip["ip"]);
    $ips[1] = explode(" ", $ips[1])[0];
    $newipv6 = $Db->get_one("select `ipv6` from `ip` where `id`=$maxid");
    $ipv6s = explode("/", $newipv6["ipv6"]);
    //echo json_encode($newipv6);
    if ($ipv == "v6")
        echo $ipv6s[0];
    else
        echo $ips[1];
}
