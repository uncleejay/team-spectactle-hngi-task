<?php

	// header('Access-Control-Allow-Origin: x');
	// header('Access-Control-Allow-Methods: GET, POST');
	// header('Access-Control-Allow-Headers: X-Requested-With');

if (isset($_SERVER['HTTP_ORIGIN'])) {
        // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
        // you want to allow, and if so:
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }

    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            // may also be using PUT, PATCH, HEAD etc
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

        exit(0);
    }

    // echo "You have CORS!";
    

	$file = file_get_contents('csvjson.json');

	if(!$file) {
		echo json_encode(["error" => "An error message"]);
	}

	// $file_a = json_decode($file, true);

	// foreach ($file_a as $key => $value) {
	// 	echo $value['FULL NAME'];
	// }

	echo $file;

?>