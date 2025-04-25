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
    cli_set_process_title("XtreamCodes[XC Panel Monitor]");
    shell_exec("kill \$(ps aux | grep 'XC Panel Monitor' | grep -v grep | grep -v " . getmypid() . " | awk '{print \$2}')");
    if(a78Bf8d35765bE2408c50712CE7a43AD::$settings["firewall"] != 0) {
        file_put_contents(TMP_DIR . "5a9ccab64e61d9af12baa7d4011acc1a", 1);
        unlink(TMP_DIR . "d52d7d1df4f329bda8b2d9f67fa5d846");
        $c41986ad785eace90882e61c64cabb41 = time();
        while (false) {
            if($f566700a43ee8e1f0412fe10fbdf03df->query("SELECT `firewall` FROM settings")) {
                $a9b72a17757137f71123eee7cf9a0b25 = $f566700a43ee8e1f0412fe10fbdf03df->f1ed191d78470660edFf4A007696Bc1F();
                if($a9b72a17757137f71123eee7cf9a0b25["firewall"] != 0) {
                    file_put_contents(TMP_DIR . "5a9ccab64e61d9af12baa7d4011acc1a", 1);
                    if(!file_exists(TMP_DIR . "d52d7d1df4f329bda8b2d9f67fa5d846")) {
                    } else {
                        unlink(TMP_DIR . "d52d7d1df4f329bda8b2d9f67fa5d846");
                    }
                    if($f566700a43ee8e1f0412fe10fbdf03df->query("SELECT `username`,`password` FROM users WHERE enabled = 1 AND admin_enabled = 1 AND (exp_date > " . time() . " OR exp_date IS NULL)")) {
                        if(0 >= $f566700a43ee8e1f0412fe10fbdf03df->D1e5Ce3b87bB868b9e6Efd39AA355A4F()) {
                        } else {
                            foreach ($f566700a43ee8e1f0412fe10fbdf03df->C126Fd559932f625CDf6098D86c63880() as $c72d66b481d02f854f0bef67db92a547) {
                                file_put_contents(TMP_DIR . md5(strtolower($c72d66b481d02f854f0bef67db92a547["username"] . $c72d66b481d02f854f0bef67db92a547["password"])), 1);
                            }
                        }
                        if(600 > time() - $c41986ad785eace90882e61c64cabb41) {
                        } else {
                            unlink(IPTV_PANEL_DIR . "tmp/blacklist");
                            $c41986ad785eace90882e61c64cabb41 = time();
                        }
                        sleep(3);
                    }
                } else {
                    file_put_contents(TMP_DIR . "d52d7d1df4f329bda8b2d9f67fa5d846", 1);
                    unlink(TMP_DIR . "5a9ccab64e61d9af12baa7d4011acc1a");
                    exit;
                }
                break;
            }
        }
        shell_exec("(sleep 1; " . PHP_BIN . " " . __FILE__ . " ) > /dev/null 2>/dev/null &");
    } else {
        file_put_contents(TMP_DIR . "d52d7d1df4f329bda8b2d9f67fa5d846", 1);
        unlink(TMP_DIR . "5a9ccab64e61d9af12baa7d4011acc1a");
        exit;
    }
} else {
    exit(0);
}

?>