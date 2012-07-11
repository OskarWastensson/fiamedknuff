<?php
	include 'db/dbSettings.php';
	include 'fb_sdk/facebook.php';
	
    // Create our Application instance
	$facebook = new Facebook(array(
		'appId'  => '457681907583102',
		'secret' => 'b79fb3d1e561e78a0cee608d9926cad5',
	));

	// Get User ID
	$userId = $facebook->getUser();
	if ($userId) {
		try {
			$userProfile = $facebook->api('/me', 'GET');
		} catch(FacebookApiException $e) {
			// User not logged in
			header('Location: ' . $facebook->getLoginUrl());
		}
	} else {
		// User not logged in
		header('Location: ' . $facebook->getLoginUrl());
	}
	
	// Check for user in api
	require_once('api/resource.class.php');
	require_once('api/users.resource.php');
	$apiObj = new Users('GET', $userId);
	$user = $apiObj->data[0];
	
	// Make new user if missing
	if (!isset($user['id'])) {
		$apiObj = new Users('POST', NULL, NULL, array(
			'id' => $userId,
			'name' => $userProfile['name']
		));
		$user = $apiObj->data[0];
	}
	
	
?>

