<?php

Class Users extends Resource {
	function set_params() {
		$this->params = array(
			'table' => 'users',
			'view' => 'users',
			'view_fields' => 'id',
			'put_fields' => 'id',
			'post_fields' => '',
			'child_resources' => ''
		);
	}
}