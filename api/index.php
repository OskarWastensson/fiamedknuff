<?php


// DB init
require_once('../db/dbSettings.php');

// User authorization
include '../fb_sdk/facebook.php';
	
    // Create our Application instance
	$facebook = new Facebook(array(
		'appId'  => '457681907583102',
		'secret' => 'b79fb3d1e561e78a0cee608d9926cad5',
	));

	// Get User ID
	$user = $facebook->getUser();

	// Login 
	if (!$user) {
		echo "{error: 'Auth'}";
		die();
	}

// API 
require_once('api.class.php');
$api = new TripAPI();
echo json_encode($api->data);
