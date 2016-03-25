<?php

require "public/index.php";

$stderr = fopen("php://stderr", "w");

if ($stderr) {

	$code = http_response_code();

	if ($code >= 200 && $code <= 299) {
		$c = "2";
	} else if ($code >= 400 && $code <= 500) {
		$c = "1";
	} else {
		$c = "3";
	}

    $access = sprintf("\033[0;34mAT\033[00m: [%s] - \033[0;34mSTAT\033[00m: %s - \033[0;34mMETHOD\033[00m: \033[0;3{$c}m%s\033[00m - \033[0;34mPATH\033[00m: %s\n", date("Y-m-d H:i:s", $_SERVER["REQUEST_TIME"]), $code, $_SERVER["REQUEST_METHOD"], $_SERVER["REQUEST_URI"]);
    fwrite($stderr, $access);
}

fclose($stderr);
