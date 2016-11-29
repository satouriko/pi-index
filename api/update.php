<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Update IP</title>
</head>

<body>

<?php
$newip = $_REQUEST["ip"];
$newipv6 = $_REQUEST["ipv6"];
$pwd = $_REQUEST["pwd"];
if ($newip != "" && $pwd == "raspberry") {
    require_once("Db.php");
    $Db = new DB_MYSQL();
    $newips = explode(' ', $newip);
    if($newipv6 == "" && count($newips) > 1)
        $newipv6 = $newips[1];
    $ip = array(
        "ip" => $newip,
        "ipv6" => $newipv6
    );
    $Db->insert("ip", $ip);
    echo "IP updated.";
} else
    echo "Access denied."
?>

</body>
</html>
