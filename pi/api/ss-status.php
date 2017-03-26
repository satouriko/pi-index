<?php
header('Access-Control-Allow-Origin:*');
$result = exec("ps -A | grep ssserver");
if(strstr($result, "ssserver"))
    echo "itworks";