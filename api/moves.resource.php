<?php
// A move is the action of moving one piece from one postion to another.
// The last move of each piece reveal the current position fo the game. 
// During play, the frontend continuesly polls for new moves.

Class Moves extends Resource {
	function set_params() {
		$this->params = array(
			'table' => 'moves',
			'view' => 'moves',
			'view_fields' => 'id, player, piece, new_position',
			'put_fields' => 'id, player, piece, new_position',
			'post_fields' =>	'player, piece, new_position',
		);
	}
}