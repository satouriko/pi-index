<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>View IP</title>
</head>

<body>

<?php
$pwd = $_REQUEST["pwd"];
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
    echo '<a href="http://' . $ips[1] . '">IPv4:' . $ips[1] . '</a><br/>';
    echo '<a href="http://[' . $ipv6s[0] . ']">IPv6:' . $ipv6s[0] . '</a>';
} else
    echo "Access denied."
?>

</body>
</html>
