<?php
// A Game is a specific instance of the game.
Class Games extends Resource {
	function set_params() {
		$this->params = array(
			'table' => 'games',
			'view' => 'games',
			'view_fields' => 'id, status',
			'put_fields' => 'id, status',
			'post_fields' =>	'status',
			'child_resources' => 'players'
		);
	}
}