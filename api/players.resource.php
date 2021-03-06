<?php
// A Player resource contain data relating the a specific users 
// status within a game.

Class Players extends Resource {
	function set_params() {
		$this->params = array(
			'table' => 'players',
			'view' => 'players',
			'view_fields' => 'id, color, games_id, users_id',
			'put_fields' => 'id, color, games_id, users_id',
			'post_fields' =>	'color, games_id, users_id',
			'child_resources' => 'moves'
		);
	}
}
