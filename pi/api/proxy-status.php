<?php
header('Access-Control-Allow-Origin:*');
$rec = array();
exec("systemctl status haproxy", $rec);
if( strpos($rec[2], "Active: active") > 0 )
    echo "itworks";
