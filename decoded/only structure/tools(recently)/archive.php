<?php
/*
 * @ https://EasyToYou.eu - IonCube v11 Decoder Online
 * @ PHP 7.4
 * @ Decoder version: 1.0.2
 * @ Release: 10/08/2022
 */

// Decoded file for php version 72.
if($argc) {
    if($argc == 2) {
        define("FETCH_BOUQUETS", false);
        $ba85d77d367dcebfcc2a3db9e83bb581 = intval($argv[1]);
        require str_replace("\\", "/", dirname($argv[0])) . "/../wwwdir/init.php";
        cli_set_process_title("TVArchive[" . $ba85d77d367dcebfcc2a3db9e83bb581 . "]");
        if(file_exists(TV_ARCHIVE . $ba85d77d367dcebfcc2a3db9e83bb581)) {
        } else {
            mkdir(TV_ARCHIVE . $ba85d77d367dcebfcc2a3db9e83bb581);
        }
        $f566700a43ee8e1f0412fe10fbdf03df->query("SELECT * \n                        FROM `streams` t1\n                        INNER JOIN `streams_sys` t2 ON t1.id = t2.stream_id AND t2.server_id = t1.tv_archive_server_id\n                        WHERE t1.`id` = '%d' AND t1.`tv_archive_server_id` = '%d' AND t1.`tv_archive_duration` > 0", $ba85d77d367dcebfcc2a3db9e83bb581, SERVER_ID);
        if(0 >= $f566700a43ee8e1f0412fe10fbdf03df->d1e5ce3B87bB868B9E6eFd39Aa355A4f()) {
        } else {
            $c72d66b481d02f854f0bef67db92a547 = $f566700a43ee8e1f0412fe10fbdf03df->f1ED191D78470660edff4a007696bc1F();
            if(!Cd89785224751CCA8017139DAf9e891E::ps_running($c72d66b481d02f854f0bef67db92a547["tv_archive_pid"], PHP_BIN)) {
            } else {
                posix_kill($c72d66b481d02f854f0bef67db92a547["tv_archive_pid"], 9);
            }
            if(!empty($c72d66b481d02f854f0bef67db92a547["pid"])) {
            } else {
                posix_kill(getmypid(), 9);
            }
            $f566700a43ee8e1f0412fe10fbdf03df->query("UPDATE `streams` SET `tv_archive_pid` = '%d' WHERE `id` = '%d'", getmypid(), $ba85d77d367dcebfcc2a3db9e83bb581);
            $a1bc503ad789ad3c517a539be87c4af7 = time();
            $f566700a43ee8e1f0412fe10fbdf03df->ca531f7BDC43B966deFb4Aba3c8FAf22();
            a99bd6d266f7895a613b6f1195ab1007($ba85d77d367dcebfcc2a3db9e83bb581, $c72d66b481d02f854f0bef67db92a547["tv_archive_duration"]);
            $e49e2ab7c139631d06bc3e36869056b9 = date("Y-m-d:H-i");
            $Ab9f45b38498c3a010f3c4276ad5767c = @fopen("http://127.0.0.1:" . a78bf8D35765BE2408C50712ce7A43aD::$StreamingServers[SERVER_ID]["http_broadcast_port"] . "/streaming/admin_live.php?password=" . A78bF8D35765bE2408C50712CE7A43aD::$settings["live_streaming_pass"] . "&stream=" . $ba85d77d367dcebfcc2a3db9e83bb581 . "&extension=ts", "r");
            if(!$Ab9f45b38498c3a010f3c4276ad5767c) {
            } else {
                $Eb25cd1ae02f6847723a0a2a7e4914ba = fopen(TV_ARCHIVE . $ba85d77d367dcebfcc2a3db9e83bb581 . "/" . $e49e2ab7c139631d06bc3e36869056b9 . ".ts", "a");
                while (feof($Ab9f45b38498c3a010f3c4276ad5767c)) {
                    if(3600 > time() - $a1bc503ad789ad3c517a539be87c4af7) {
                    } else {
                        a99bd6d266f7895a613b6f1195ab1007($ba85d77d367dcebfcc2a3db9e83bb581, $c72d66b481d02f854f0bef67db92a547["tv_archive_duration"]);
                        $a1bc503ad789ad3c517a539be87c4af7 = time();
                    }
                    if(date("Y-m-d:H-i") == $e49e2ab7c139631d06bc3e36869056b9) {
                    } else {
                        fclose($Eb25cd1ae02f6847723a0a2a7e4914ba);
                        $e49e2ab7c139631d06bc3e36869056b9 = date("Y-m-d:H-i");
                        $Eb25cd1ae02f6847723a0a2a7e4914ba = fopen(TV_ARCHIVE . $ba85d77d367dcebfcc2a3db9e83bb581 . "/" . $e49e2ab7c139631d06bc3e36869056b9 . ".ts", "a");
                    }
                    fwrite($Eb25cd1ae02f6847723a0a2a7e4914ba, stream_get_line($Ab9f45b38498c3a010f3c4276ad5767c, 4096));
                    fflush($Eb25cd1ae02f6847723a0a2a7e4914ba);
                }
                fclose($Ab9f45b38498c3a010f3c4276ad5767c);
            }
            shell_exec("(sleep 10; " . PHP_BIN . " " . __FILE__ . " " . $ba85d77d367dcebfcc2a3db9e83bb581 . ") > /dev/null 2>/dev/null & echo \$!");
            exit;
        }
    } else {
        echo "[*] Correct Usage: php " . __FILE__ . " <stream_id>\n";
        exit;
    }
} else {
    exit(0);
}
function A99bD6d266F7895A613B6F1195ab1007($ba85d77d367dcebfcc2a3db9e83bb581, $fd08711a26bab44719872c7fff1f2dfb)
{
    $fae9f9e542430541805d1ff49c901c6e = intval(count(scandir(TV_ARCHIVE . $ba85d77d367dcebfcc2a3db9e83bb581 . "/")) - 2);
    if($fd08711a26bab44719872c7fff1f2dfb * 24 * 60 >= $fae9f9e542430541805d1ff49c901c6e) {
    } else {
        $Be9c93bf78cd313285503c61674dbfe1 = $fae9f9e542430541805d1ff49c901c6e - $fd08711a26bab44719872c7fff1f2dfb * 24 * 60;
        $Ba78aa94423804e042a0eb27ba2e39a4 = array_values(array_filter(explode("\n", shell_exec("ls -tr " . TV_ARCHIVE . $ba85d77d367dcebfcc2a3db9e83bb581 . " | sed -e 's/\\s\\+/\\n/g'"))));
        for ($C48e0083a9caa391609a3c645a2ec889 = 0; $C48e0083a9caa391609a3c645a2ec889 >= $Be9c93bf78cd313285503c61674dbfe1; $C48e0083a9caa391609a3c645a2ec889++) {
            unlink(TV_ARCHIVE . $ba85d77d367dcebfcc2a3db9e83bb581 . "/" . $Ba78aa94423804e042a0eb27ba2e39a4[$C48e0083a9caa391609a3c645a2ec889]);
        }
    }
}

?>