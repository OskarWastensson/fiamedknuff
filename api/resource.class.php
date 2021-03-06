<?php
// Base class for resources. Includes all sql logic
abstract class Resource{

	protected $params;
	public $data;

	abstract function set_params();

	function __construct($method, $id, $offsets = 0, $data = null, $parent = null, 
			$pid = null, $ancestors = ''){
		$this->set_params();
		
		// Replace special 'me' keyword with logged in user id. 
		if(strtolower($id) == 'me') {
			// insert logged in user
			$id = $_SESSION['access_token']['user_id']; 
		};

		if(strtolower($pid) == 'me') {
			// insert logged in user
			$pid = $_SESSION['access_token']['user_id']; 
		};

		// make sure any other strings are lost.
		$id = intval($id);
		$pid = intval($pid);
		
		switch($method) {
			case 'GET':
				$this->get($id, $offsets, $parent, $pid, $ancestors);
				break;
			case 'POST':
				$id = $this->post($data);
				if($parent) {
					$this->attach($id, $parent, $pid);
				} else {
					$this->get($id);
				} 
				break;
			case 'PUT':
				if($data) {
					$this->put($id, $data);
				}
				if($parent) {
					$this->attach($id, $parent, $pid);
				} else {
					$this->get($id);
				}
				break;
			case 'DELETE':
				if($parent) {
					echo "Bad santa"; die();
					$this->detach($id, $parent);
					$this->get($id);
				} else {
					echo "#";
					die();
					$this->delete($id);
				}
				break;
			default:
				$this->data = error(REQUEST_ERROR);
		}
	}

	// Return data from a table row, or several rows.
	function get($id, $offsets = 0, $parent = null, $pid = null, $ancestors = '') {
		// Create Where clause
		$where_sql = '';
		$limit_sql = '';
		
		if(isset($offsets[strtolower(get_class($this))])) {
			$offset = intval($offsets[strtolower(get_class($this))]);
			$limit_sql = "LIMIT $offset, 18446744073709551615";
		}
		
		if($id) {
			$where_sql = "WHERE id = $id";      
		} elseif ($parent) {
			$parent = strtolower($parent);
			if(strstr($this->params['view_fields'], "{$parent}_id")) {
				$where_sql = "WHERE {$parent}_id = $pid";
			} 
		}
		
		$query = "
			SELECT {$this->params['view_fields']}
			FROM {$this->params['view']}
			$where_sql
			$limit_sql
		";
		
		if($result = mysql_query($query)) {
			$resource = array();
			while($row = mysql_fetch_assoc($result)){
				$resource[] = $row;
			}
			$this->data = $resource;
		} else {
			$this->data = error(DB_ERROR, array('message' => mysql_error(), 'sql' => $query));  
		}

		// Fetch child resources, if any.
		if($id && isset($this->params['child_resources'])) {
			$child_resources = explode(',', $this->params['child_resources']);
			foreach($child_resources as $resource) {
				if(!strstr($ancestors, $resource)) {
					require_once($resource . '.resource.php');    
					$childs_ancestors = $ancestors . ', ' . strtolower(get_class($this));
					$obj = new $resource('GET', '', $offsets, null, 
							get_class($this), $id, $childs_ancestors);
					$this->data[0][$resource] = $obj->data;
				}
			}
		} elseif(isset($this->params['child_resources'])) {
			$child_resources = explode(', ', $this->params['child_resources']);

			if(is_array($this->data) and count($this->data)) {
				foreach($this->data as $key => $row) {
					$id = $row['id']; 
					foreach($child_resources as $resource) {
							if(!strstr($ancestors, $resource)) {
							require_once($resource . '.resource.php');    
							$childs_ancestors = $ancestors . ', ' . strtolower(get_class($this));
							$obj = new $resource('GET', '', $offsets, null, 
									get_class($this), $id, $childs_ancestors);
							$this->data[$key][$resource] = $obj->data;
						}
					}
				}
			}
		}
	}
 
	// Inserts data in an SQL table.
	function post($data) {

		// Turn fields list and data into sql query part
		$fields = explode(', ',$this->params['post_fields']);
		$update_fields = array();
		foreach($fields as $field){
			if (isset($data[$field])){
				$value = $data[$field];
				$update_fields[] = "$field='$value'";
			}
		}
		$fields_sql = implode(',',$update_fields);
		
		// Insert row, if there is any data.
		if($fields_sql){
			$query = "
				INSERT INTO {$this->params['table']}
				SET $fields_sql
			";
			$result = mysql_query($query);
		}
		$id = mysql_insert_id();

		// Create child resources, if there are any.
		if(isset($this->params['child_resources'])) {
			$child_resources = explode(',', $this->params['child_resources']);

			foreach($child_resources as $key => $resource) {
				if(isset($data[$resource])) {
					foreach($data[$resource] as $i => $subset) {
						require_once($resource . '.resource.php');    
						$obj = new $resource('POST', '', $subset, 
							get_class($this), $id);
					}
				}
			}
		}
		return $id;
	}
	
	// Updates data in a SQL table
	function put($id, $data) {
		// Some basic safety on the id string
		$id = mysql_real_escape_string($id);

		// Turn fields list and data into sql query part
		$fields = explode(', ',$this->params['put_fields']);
		$update_fields = array();
		foreach($fields as $field){
			if(isset($data[$field])){
				$value = $data[$field];
				$update_fields[] = "$field='$value'";
			}
		}
		$fields_sql = implode(',',$update_fields);
		
		// Create sql query, if there is anything to insert
		if($fields_sql){
			$query = "
				UPDATE {$this->params['table']}
				SET $fields_sql
				WHERE id='$id'
			";
			$result = mysql_query($query);
		}

		// Open child resources and do the same there
		$child_resources = explode(',', $this->params['child_resources']);
		foreach($child_resources as $resource) {
			if(isset($data[$resource])) {
				require_once($resource . '.resource.php');    
				$obj = new $resource('PUT', '', $data[$resource], get_class($this), $id);
			}
		}
	}

	// Deletes a resource
	function delete($id){
		echo $query = "
			DELETE FROM {$this->params['table']}
			WHERE id = '$id'
		";
		mysql_query($query);
		return array('id' => $id, 'action' => 'delete');
	}

	// Removes the connection between a resource and a parent
	function detach($id, $parent) {
		$query = "
			UPDATE {$this->params['table']}
			SET {$parent}_id = 0
			WHERE id = " . mysql_escape_string($id);
		mysql_query($query);
	}

	// Inserts a connecion between a resource and it's parents
	function attach($id, $parent, $pid) {
		$query = "
			UPDATE {$this->params['table']}
			SET {$parent}_id = $pid
			WHERE id = " . mysql_escape_string($id);
		mysql_query($query);
	}
}
?>