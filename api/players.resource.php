<?php
// A Player resource contain data relating the a specific users 
// status within a game.

Class Players extends Resource {
	function set_params() {
		$this->params = array(
			'table' => 'players',
			'view' => 'players',
			'view_fields' => 'id, twitterid, name',
			'put_fields' => 'id, twitterid, name',
			'post_fields' =>	'twitterid, name',
			'child_resources' => 'trips'
		);
	}
}
