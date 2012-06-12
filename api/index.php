<?php
session_start();

// constants
const REQUEST_ERROR = 1;
const DB_ERROR = 2;
const EMPTY_SET = 3;
const ACCESS_RESTRICTED = 4;

// DB init
require_once('../db/dbSettings.php');

// User authorization

// @TODO: USer authoriszation


// API 
require_once('api.class.php');
$api = new TripAPI();
echo json_encode($api->data);

// Just an error handling function
function error($no, $return_data = array()) {
	// Which is not needed in this project
	
	//switch($no) {
	//case EMPTY_SET: 
	//	return $return_data + array("error" => "EMPTY_SET");
	//case REQUEST_ERROR: 
	//	header("HTTP/1.0 404 Not Found");
	//	return $return_data + array("error" => "REQUEST_ERROR");
	//case DB_ERROR:
	//	header("HTTP/1.0 500 Internal server error");
	//	return $return_data + array("error" => "DB_ERROR");
	//case ACCESS_RESTRICTED:
	//	header("HTTP/1.0 401 Unauthorized");
	//	return $return_data + array("error" => "ACCESS_RESTRICTED");
	//default:
	//	header("HTTP/1.0 500 Internal server error");
	//	return $return_data + array("error" => "Unknown error");
	//}
}