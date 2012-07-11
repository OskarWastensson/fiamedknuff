<?php
	include 'fb_sdk/facebook.php';
	
    // Create our Application instance
	$facebook = new Facebook(array(
		'appId'  => '457681907583102',
		'secret' => 'b79fb3d1e561e78a0cee608d9926cad5',
	));

	// Get User ID
	$user = $facebook->getUser();

	// Login 
	if (!$user) {
		header('Location: ' . $facebook->getLoginUrl());
	}
?>
<html>
<head>
	<title>Ludo</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script type="text/javascript" src="scripts/jquery-1.7.1.js"></script>
	<script type="text/javascript" src="scripts/gameLogic.js"></script>
	<script type="text/javascript" src="scripts/dice.js"></script>
	<script type="text/javascript" src="scripts/piece.js"></script>
	<script type="text/javascript" src="scripts/player.js"></script>
</head>
<body>
	<div class="ribbon-wrapper">
		<div class="ribbon-front">
			<h1>Ludo</h1>
		</div>
		<div class="ribbon-edge-topleft"></div>
		<div class="ribbon-edge-topright"></div>
		<div class="ribbon-edge-bottomleft"></div>
		<div class="ribbon-edge-bottomright"></div>
		<div class="ribbon-back-left"></div>
		<div class="ribbon-back-right"></div>
	</div>
	<div id="diceArea">
		
		<div id="dice">
			<div id="diceValue"></div>
		</div>
		
		<div id="diceMessage">
			<p>Click the dice!</p>
		</div>
	</div>
	<div class="boardWrapper">
		<!-- new row -->
		<div class="home yellow"></div>
		<div class="topWrapper">
			<span value="18" class="bricks">18 lap</span>
			<span value="19" class="bricks">19 lap</span>
			<span value="20" class="bricks start-blue">20 start-blue</span>
			<span value="17" class="bricks">17 lap</span>
			<span value="40" class="bricks">40 sprint-blue</span>
			<span value="21" class="bricks">21 lap</span>
			<span value="16" class="bricks">16 lap</span>
			<span value="41" class="bricks">41 sprint-blue</span>
			<span value="22" class="bricks">22 lap</span>
			<span value="15" class="bricks">15 lap</span>
			<span value="42" class="bricks">42 sprint-blue</span>
			<span value="23" class="bricks">23 lap</span>
		</div>
		<div class="home blue"></div>

		<div class="middleWrapper">
			<span value="10" class="bricks start-yellow" >10 start-yellow</span>
			<span value="11" class="bricks">11 lap</span>
			<span value="12" class="bricks">12 lap</span>
			<span value="13" class="bricks">13 lap</span>
			<span value="14" class="bricks">14 lap</span>
			<span value="43" class="bricks sprint-blue">43 sprint-blue</span>
			<span value="24" class="bricks">24 lap</span>
			<span value="25" class="bricks">25 lap</span>
			<span value="26" class="bricks">26 lap</span>
			<span value="27" class="bricks">27 lap</span>
			<span value="28" class="bricks">28 lap</span>
			<span value="9"  class="bricks sprint-start-yellow" >9 sprint-start-yellow</span>
			<span value="50" class="bricks sprint-yellow">50 sprint-yellow</span>
			<span value="51" class="bricks sprint-yellow">51 sprint-yellow</span>
			<span value="52" class="bricks sprint-yellow">52 sprint-yellow</span>
			<span value="53" class="bricks sprint-yellow">53 sprint-yellow</span>
			<span value="100" class="bricks finish">100 finish</span>
			<span value="63" class="bricks sprint-red">63 sprint-red</span>
			<span value="62" class="bricks sprint-red">62 sprint-red</span>
			<span value="61" class="bricks sprint-red">61 sprint-red</span>
			<span value="60" class="bricks sprint-red">60 sprint-red</span>
			<span value="29" class="bricks sprint-red-start" >29 sprint-red-start</span>
			<span value="8"  class="bricks">8 lap</span>
			<span value="7"  class="bricks">7 lap</span>
			<span value="6"  class="bricks">6 lap</span>
			<span value="5"  class="bricks">5 lap</span>
			<span value="4"  class="bricks">4 lap</span>
			<span value="73" class="bricks sprint-green">73 sprint-green</span>
			<span value="34" class="bricks">34 lap</span>
			<span value="33" class="bricks">33 lap</span>
			<span value="32" class="bricks">32 lap</span>
			<span value="31" class="bricks">31 lap</span>
			<span value="30" class="bricks start-red" >30 start-red</span>
		</div>
		
		<div class="home green"></div>
		<div class="bottomWrapper">
			<span value="3"  class="bricks">3 lap</span>
			<span value="72" class="bricks sprint-green">72 sprint-green</span>
			<span value="35" class="bricks">35 lap</span>
			<span value="2"  class="bricks">2 lap</span>
			<span value="71" class="bricks sprint-green">73 sprint-green</span>
			<span value="36" class="bricks">36 lap</span>
			<span value="1"  class="bricks">1 lap</span>
			<span value="70" class="bricks sprint-green">70 sprint-green</span>
			<span value="37" class="bricks">37 lap</span>
			<span value="0"  class="bricks start-green">0 start-green</span>
			<span value="39" class="bricks sprint-start-green" value="39">39</span>
			<span value="38" class="bricks">38 lap</span>
		</div>
		<div class="home red"></div>
	</div>
</body>
</html>