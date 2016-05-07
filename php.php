<?php
$code = urldecode($_GET["code"]); //Get source code from url. e.g. "example.com/php.php?code=echo%20%27hi%27;" returns "echo 'hi';".


//Sanitize the input
$code = preg_replace("/phpinfo\(.*?\);/i", "", $code); //Blocks phpinfo();
$code = preg_replace("/eval\(.*?\);/i", "", $code); //Blocks eval();
$code = preg_replace("/exec\(.*?\);/i", "", $code); //Blocks exec();
$code = preg_replace("/shell_exec\(.*?\);/i", "", $code); //Blocks shell_exec();
$code = preg_replace("/`.*?`/i", "", $code); //Blocks backticks.
$code = preg_replace("/popen\(.*?\);/i", "", $code); //Blocks popen();
$code = preg_replace("/pcntl_exec\(.*?\);/i", "", $code); //Blocks pcntl_exec();
$code = preg_replace("/system\(.*?\);/i", "", $code); //Blocks system();
$code = preg_replace("/create_function\(.*?\);/i", "", $code); //Blocks create_function();
$code = preg_replace("/preg_replace\(.*?\/e.?,.*?,.*?\);/i", "", $code); //Blocks preg_replace("/e", "");
$code = preg_replace("/include\(.*?\);/i", "", $code); //Blocks include();
$code = preg_replace("/include_once\(.*?\);/i", "", $code); //Blocks include_once();
$code = preg_replace("/require\(.*?\);/i", "", $code); //Blocks require();
$code = preg_replace("/require_once\(.*?\);/i", "", $code); //Blocks require_once();
$code = preg_replace("/proc_open\(.*?\);/i", "", $code); //Blocks proc_open();
$code = preg_replace("/passthru\(.*?\);/i", "", $code); //Blocks passthru();
$code = preg_replace("/assert\(.*?\);/i", "", $code); //Blocks assert();
$code = preg_replace("/putenv\(.*?\);/i", "", $code); //Blocks putenv();
$code = preg_replace("/ini_set\(.*?\);/i", "", $code); //Blocks ini_set();
$code = preg_replace("/proc_terminate\(.*?\);/i", "", $code); //Blocks proc_terminate();
$code = preg_replace("/proc_close\(.*?\);/i", "", $code); //Blocks proc_close();
$code = preg_replace("/.?fsocketopen\(.*?\);/i", "", $code); //Blocks pfsocketopen(); and fsocketopen();
$code = preg_replace("/apache_child_terminate\(.*?\);/i", "", $code); //Blocks apache_child_terminate();
$code = preg_replace("/exit\(.*?\);/i", "", $code); //Blocks exit();
$code = preg_replace("/fopen\(.*?\);/i", "", $code); //Blocks fopen();
$code = preg_replace("/chown\(.*?\);/i", "", $code); //Blocks chown();
$code = preg_replace("/chmod\(.*?\);/i", "", $code); //Blocks chmod();
$code = preg_replace("/chgrp\(.*?\);/i", "", $code); //Blocks chgrp();
$code = preg_replace("/mkdir\(.*?\);/i", "", $code); //Blocks mkdir();
$code = preg_replace("/rmdir\(.*?\);/i", "", $code); //Blocks rmdir();
$code = preg_replace("/mkdir\(.*?\);/i", "", $code); //Blocks mkdir();
$code = preg_replace("/copy\(.*?\);/i", "", $code); //Blocks copy();
$code = preg_replace("/unserialize\(.*?\);/i", "", $code); //Blocks unserialize();

eval($code); //Runs the (hopefully) clean code.



?>
