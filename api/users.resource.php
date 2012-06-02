<?php

Class Users extends Resource {
	function set_params() {
		$this->params = array(
			'table' => 'users',
			'view' => 'users',
			'view_fields' => 'id, name, email',
			'put_fields' => 'id, name, email',
			'post_fields' => 'name, email',
			'child_resources' => 'players'
		);
	}
}