<?php
// A Game is a specific instance of the game.
Class Games extends Resource {
	function set_params() {
		$this->params = array(
			'table' => 'games',
			'view' => 'games',
			'view_fields' => 'id, created, won, winner',
			'put_fields' => 'id, won, winner',
			'post_fields' =>	'created, won, winner',
			'child_resources' => 'players, moves'
		);
	}
}