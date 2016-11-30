<?php
header('Access-Control-Allow-Origin:*');
if( file_exists("/home/pi/picar.lock")  )
{
    echo "on";
}
