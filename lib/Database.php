<?php

class Database {
	private $server = DB_HOST;
	private $user   = DB_USER;
	private $pass   = DB_PASS;
	private $db     = DB_NAME;

	protected $conn;
	
	public function __construct(){
		$this->connectDb();
	}

	private function connectDb(){
		if (!isset($this->conn)) {
			$this->conn = new mysqli($this->server, $this->user, $this->pass, $this->db);

			if (!$this->conn) {
				echo "Connection fail..";
				exit();
			}
		}
		return $this->conn;
	}

	public function select($query){
		$result = $this->conn->query($query);

		if ($result->num_rows > 0) {
			return $result;
		}
		else {
			return false;
		}
	}

	public function insert($query) {
		$result = $this->conn->query($query);

		if ($result) {
			return $result;
		} else {
			return false;
		}
	}

	public function update($query) {
		$update = $this->conn->query($query);

		if ($update) {
			return $update;
		} else {
			return false;
		}
	}

	public function delete($query){
		$delete = $this->conn->query($query);
		if ($delete) {
			return $delete;
		} else {
			return false;
		}
	}

}

/*$db = new Database();
$db->select($query);*/

?>