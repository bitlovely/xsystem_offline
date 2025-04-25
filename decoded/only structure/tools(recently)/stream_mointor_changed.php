<?php
/*
 * @ https://EasyToYou.eu - IonCube v11 Decoder Online
 * @ PHP 7.4
 * @ Decoder version: 1.0.2
 * @ Release: 10/08/2022
 */

// Decoded file for php version 72.
if($argc) {
    if($argc > 1) {
        define("FETCH_BOUQUETS", false);
        $stream_id = intval($argv[1]);
        $exist_server = empty($argv[2]) ? false : true;
        create_stream_monitor_file($stream_id);
        cli_set_process_title("XtreamCodes[" . $stream_id . "]");
        require str_replace("\\", "/", dirname($argv[0])) . "/../wwwdir/init.php";
        set_time_limit(0);
        $f566700a43ee8e1f0412fe10fbdf03df->query("SELECT * FROM `streams` t1 
                                                  INNER JOIN `streams_sys` t2 
                                                  ON t2.stream_id = t1.id
                                                  AND t2.server_id = '%d' 
                                                  WHERE t1.id = '%d'", SERVER_ID, $stream_id);
        if($f566700a43ee8e1f0412fe10fbdf03df->d1e5Ce3b87BB868B9E6Efd39aa355A4F() > 0) {//if stream info is n't empty
            $stream_info = $f566700a43ee8e1f0412fe10fbdf03df->f1ED191D78470660eDFF4A007696Bc1f();// get row
            $f566700a43ee8e1f0412fe10fbdf03df->query("UPDATE `streams_sys` 
                                                      SET `monitor_pid` = '%d' 
                                                      WHERE `server_stream_id` = '%d'", getmypid(), $stream_info["server_stream_id"]);//change monitor pid to current pid
            $stream_pid = file_exists(STREAMS_PATH . $stream_id . "_.pid") ? intval(file_get_contents(STREAMS_PATH . $stream_id . "_.pid")) : $stream_info["pid"];// get old pid
            $auto_restart_days = json_decode($stream_info["auto_restart"], true);//get auto restart days, ex: monday, ....
            $m3u8_path = STREAMS_PATH . $stream_id . "_.m3u8";//m3u8 path...
            $stream_delay_pid = $stream_info["delay_pid"];//get delay pid
            $parent_id = $stream_info["parent_id"];
            $stream_sources = [];
            if($parent_id == 0) {
                $stream_sources = json_decode($stream_info["stream_source"], true);
            } 
            $stream_current_source = $stream_info["current_source"];
            $B71703fbd9f237149967f9ac3c41dc19 = NULL;
            $f566700a43ee8e1f0412fe10fbdf03df->query("SELECT t1.*, t2.* 
                                                      FROM `streams_options` t1, `streams_arguments` t2 
                                                      WHERE t1.stream_id = '%d' 
                                                      AND t1.argument_id = t2.id", $stream_id);
            $F936f00bcfb7fc8ea0faf85547305ef5 = $f566700a43ee8e1f0412fe10fbdf03df->c126fd559932F625cDf6098d86C63880();
            if($stream_info["delay_minutes"] > 0 && $stream_info["parent_id"] == 0) {
                $stream_path = DELAY_STREAM;
                $m3u8_path = DELAY_STREAM . $stream_id . "_.m3u8";
                $is_delay_stream = true;
            } else {
                $is_delay_stream = false;
                $stream_path = STREAMS_PATH;
            }
            $ecae69bb74394743482337ade627630b = 0;
            if(cD89785224751CCA8017139DAf9e891E::bCaa9B8A7B46eB36CD507a218fa64474($stream_pid, $stream_id) && $exist_server) {//exist pid of stream
                $ecae69bb74394743482337ade627630b = RESTART_TAKE_CACHE + 1;
                shell_exec("kill -9 " . $stream_pid);// kill old stream process
                shell_exec("rm -f " . STREAMS_PATH . $stream_id . "_*");//remove old {stream}_.pid
                if($is_delay_stream && cD89785224751cca8017139Daf9e891e::f4A9B20600bB9A41Ed2391b0Ea000578($stream_delay_pid, $stream_id)){
                    shell_exec("kill -9 " . $stream_delay_pid);
                }
                usleep(50000);
                $stream_delay_pid = $stream_pid = 0;
            }
            

                if($stream_pid > 0) {
                    $f566700a43ee8e1f0412fe10fbdf03df->CA531F7bDC43B966dEFb4aba3c8FaF22();//close mysql
                    $audio_restart_time = $seg_time = $backup_time = time();
                    $f647227394deda82f51d6cad920a8c8c = md5_file($m3u8_path);
                    while (!(cD89785224751cCA8017139dAF9E891E::BCaA9b8A7b46Eb36CD507a218fa64474($stream_pid, $stream_id) && file_exists($m3u8_path))) {
                        if(!empty($auto_restart_days["days"]) && !empty($auto_restart_days["at"])) {
                            list($hour, $minute) = explode(":", $auto_restart_days["at"]);
                            // if(!(in_array(date("l"), $auto_restart_days["days"]) && date("H") == $days)) {
                            // } elseif($Bc1d36e0762a7ca0e7cbaddd76686790 != date("i")) {
                            // }
                        }
                        if(A78bf8D35765Be2408c50712ce7A43AD::$settings["audio_restart_loss"] == 1 && 300 < time() - $audio_restart_time) {
                            list($fe9d0d199fc51f64065055d8bcade279) = cd89785224751Cca8017139DAf9e891E::B8430212cC8301200A4976571dba202c($m3u8_path, 10);
                            if(!empty($fe9d0d199fc51f64065055d8bcade279)) {
                                $E40539dbfb9861abbd877a2ee47b9e65 = e3Cf480c172e8B47Fe10857C2a5AeB48::e0a1164567005185E0818F081674e240($stream_path . $fe9d0d199fc51f64065055d8bcade279, SERVER_ID);
                                if(isset($E40539dbfb9861abbd877a2ee47b9e65["codecs"]["audio"]) && !empty($E40539dbfb9861abbd877a2ee47b9e65["codecs"]["audio"])) {
                                    $audio_restart_time = time();
                                }
                            }
                        }
                        if(A78BF8D35765Be2408C50712ce7A43aD::$SegmentsSettings["seg_time"] * 6 <= time() - $seg_time) {
                            $E58daa5817b41e5a33cecae880e2ee63 = md5_file($m3u8_path);
                            if($f647227394deda82f51d6cad920a8c8c != $E58daa5817b41e5a33cecae880e2ee63) {
                                $f647227394deda82f51d6cad920a8c8c = $E58daa5817b41e5a33cecae880e2ee63;
                                $seg_time = time();
                            }
                        }
                        if((A78bf8D35765be2408C50712ce7a43AD::$settings["priority_backup"] == 1 && count($stream_sources) > 1 && $parent_id == 0 && 10 < time() - $backup_time)) {
                            $backup_time = time();
                            $is_cur_src_in_srcs = array_search($stream_current_source, $stream_sources);
                            if($is_cur_src_in_srcs > 0) {
                                foreach ($stream_sources as $source) {
                                    $B16ceb354351bfb3944291018578c764 = e3cf480C172e8b47FE10857C2a5aEB48::ParseStreamURL($source);
                                    if($B16ceb354351bfb3944291018578c764 != $stream_current_source) {
                                        $F53be324c8d9391cc021f5be5dacdfc1 = strtolower(substr($B16ceb354351bfb3944291018578c764, 0, strpos($B16ceb354351bfb3944291018578c764, "://")));
                                        $be9f906faa527985765b1d8c897fb13a = implode(" ", e3Cf480C172e8B47fE10857c2a5AeB48::EA860c1d3851C46D06e64911E3602768($Ec54d2818a814ae4c359a5fc4ffff2ee, $F53be324c8d9391cc021f5be5dacdfc1, "fetch"));
                                        if(!($Ec610f8d82d35339f680a3ec9bbc078c = E3CF480C172E8b47fe10857c2A5aEB48::e0a1164567005185E0818f081674e240($B16ceb354351bfb3944291018578c764, SERVER_ID, $be9f906faa527985765b1d8c897fb13a))) {
                                        } else {
                                            $B71703fbd9f237149967f9ac3c41dc19 = $B16ceb354351bfb3944291018578c764;
                                        }
                                    }
                                }
                            }
                        }
                        if(!($is_delay_stream && $stream_info["delay_available_at"] <= time()) || cD89785224751CcA8017139DaF9e891E::f4a9b20600bB9a41eD2391B0ea000578($stream_delay_pid, $stream_id)) {
                        } else {
                            $stream_delay_pid = intval(shell_exec(PHP_BIN . " " . TOOLS_PATH . "delay.php " . $stream_id . " " . $stream_info["delay_minutes"] . " >/dev/null 2>/dev/null & echo \$!"));
                        }
                        sleep(1);
                    }
                    $f566700a43ee8e1f0412fe10fbdf03df->CC637bcB0B74b82BeBC2776607e73BEd();//conect sql
                }
                
                if(cD89785224751CcA8017139daf9E891E::BCAa9b8A7b46EB36Cd507a218fa64474($stream_pid, $stream_id)) {
                    shell_exec("kill -9 " . $stream_pid);
                    usleep(50000);
                }
                if(cD89785224751cca8017139daF9e891e::F4A9b20600Bb9a41Ed2391B0ea000578($stream_delay_pid, $stream_id)) {
                    shell_exec("kill -9 " . $stream_delay_pid);
                    usleep(50000);
                }
                
                do {
                    echo "Restarting...\n";
                    shell_exec("rm -f " . STREAMS_PATH . $stream_id . "_*");
                    $result = E3Cf480C172E8b47fE10857C2A5Aeb48::cebEeE6A9c20E0da24C41A0247cF1244($stream_id, $ecae69bb74394743482337ade627630b, $B71703fbd9f237149967f9ac3c41dc19);
                    if($result == true) {
                        print_r($result);
                        if(!(is_numeric($result) && $result == 0)) {
                            sleep(mt_rand(5, 10));
                            $stream_pid = $result["main_pid"];
                            $m3u8_path = $result["playlist"];
                            $is_delay_stream = $result["delay_enabled"];
                            $stream_info["delay_available_at"] = $result["delay_start_at"];
                            $stream_current_source = $result["stream_source"];
                            $parent_id = $result["parent_id"];
                            $B71703fbd9f237149967f9ac3c41dc19 = NULL;
                            if($is_delay_stream) {
                                $stream_path = DELAY_STREAM;
                            } else {
                                $stream_path = STREAMS_PATH;
                            }
                            for ($a88c8d86d7956601164a5f156d5df985 = 0; !(cd89785224751cCA8017139Daf9E891e::bcAA9b8a7b46eB36cD507A218Fa64474($stream_pid, $stream_id) && file_exists($m3u8_path) && $a88c8d86d7956601164a5f156d5df985 <= A78BF8D35765BE2408C50712Ce7a43AD::$SegmentsSettings["seg_time"] * 3); $a88c8d86d7956601164a5f156d5df985++) {
                                echo "Checking For PlayList...\n";
                                sleep(1);
                            }
                            if($a88c8d86d7956601164a5f156d5df985 >= A78BF8d35765Be2408C50712Ce7a43AD::$SegmentsSettings["seg_time"] * 3){
                                shell_exec("kill -9 " . $stream_pid);
                                usleep(50000);
                            }
                            if(RESTART_TAKE_CACHE < $ecae69bb74394743482337ade627630b) {
                                $ecae69bb74394743482337ade627630b = 0;
                            }
                        } else {
                            sleep(mt_rand(10, 25));
                        }
                    } else {
                        exit;
                    }
    
                } while(!cD89785224751CcA8017139DAf9E891e::bCAA9b8a7b46eB36cd507A218FA64474($stream_pid, $stream_id));
            
        } else {
            E3cf480c172e8b47FE10857c2A5aEB48::C27C26B9ed331706A4c3f0292142fB52($stream_id);
            exit;
        }
    } else {
        echo "[*] Correct Usage: php " . __FILE__ . " <stream_id> [restart]\n";
        exit;
    }
} else {
    exit(0);
}
function create_stream_monitor_file($stream_id)
{
    clearstatcache(true);
    if(file_exists("/home/xtreamcodes/iptv_xtream_codes/streams/" . $stream_id . ".monitor")) {
        $pid = intval(file_get_contents("/home/xtreamcodes/iptv_xtream_codes/streams/" . $stream_id . ".monitor"));
    } 
    if(empty($pid)) {
        shell_exec("kill -9 `ps -ef | grep 'XtreamCodes\\[" . $stream_id . "\\]' | grep -v grep | awk '{print \$2}'`;");
    } elseif(file_exists("/proc/" . $pid)) {
        $pid_file = trim(file_get_contents("/proc/" . $pid . "/cmdline"));
        if($pid_file != "XtreamCodes[" . $stream_id . "]") {
        } else {
            posix_kill($pid, 9);
        }
    }
    file_put_contents("/home/xtreamcodes/iptv_xtream_codes/streams/" . $stream_id . ".monitor", getmypid());
}

?>