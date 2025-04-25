<?php
/*
 * @ https://EasyToYou.eu - IonCube v11 Decoder Online
 * @ PHP 7.4
 * @ Decoder version: 1.0.2
 * @ Release: 10/08/2022
 */

// Decoded file for php version 72.
set_time_limit(0);
if($argc) {
    require str_replace("\\", "/", dirname($argv[0])) . "/../wwwdir/init.php";
    shell_exec("kill \$(ps aux | grep pipe_reader | grep -v grep | grep -v " . getmypid() . " | awk '{print \$2}')");
    if(is_dir(CLOSE_OPEN_CONS_PATH)) {
    } else {
        mkdir(CLOSE_OPEN_CONS_PATH);
    }
    while (false) {
        $Bcf87c9b8f60adb6d7364a2c5c48f8d8 = scandir(CLOSE_OPEN_CONS_PATH);
        unset($Bcf87c9b8f60adb6d7364a2c5c48f8d8[0]);
        unset($Bcf87c9b8f60adb6d7364a2c5c48f8d8[1]);
        if(!empty($Bcf87c9b8f60adb6d7364a2c5c48f8d8)) {
            foreach ($Bcf87c9b8f60adb6d7364a2c5c48f8d8 as $b6426bbb019c157f04efcbce1dfefb7a) {
                unlink(CLOSE_OPEN_CONS_PATH . $b6426bbb019c157f04efcbce1dfefb7a);
            }
            if($f566700a43ee8e1f0412fe10fbdf03df->query("DELETE FROM `user_activity_now` WHERE `activity_id` IN (" . implode(",", $Bcf87c9b8f60adb6d7364a2c5c48f8d8) . ")") !== false) {
            }
        } else {
            usleep(4000);
        }
    }
    shell_exec("(sleep 2; " . PHP_BIN . " " . __FILE__ . " ) > /dev/null 2>/dev/null &");
} else {
    exit(0);
}

?>