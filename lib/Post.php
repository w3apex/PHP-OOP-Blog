<?php 
	include("Database.php");
	include("Format.php");
?>

<?php
	class Post {

		private $db;
		private $fm;
		
		public function __construct() {
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function show() { //Get all Data/Categories 
			$query = "SELECT * FROM posts ORDER BY id DESC";
	        $result = $this->db->select($query);

	        return $result;
		}

		public function store($data) { //Insert Data/posts
			$name = $this->fm->validation($data);

			if (!empty($name)) {
				$query = "INSERT INTO posts(name) VALUES('$name')";
				$catInsert = $this->db->insert($query);

				if ($catInsert) {
	                return $msg = "<span class='success'>Post inserted successfully..</span>";
	            } 
	            else {
	                return $msg = "<span class='error'>Post not inserted !!</span>";
	            }
			} 
			else {
				return $msg = "<span class='error'>Field must not be empty</span>";
			}   
		}

		public function edit($id) { //Get single Data/Categories
			$query = "SELECT * FROM posts WHERE id = '$id'";
            $result = $this->db->select($query);

            return $result;
		}

		public function update($data, $id) { //Update Data/posts
			$name = $this->fm->validation($data);

			if (!empty($name)) {
				$query = "UPDATE posts SET name = '$name' WHERE id = '$id'";

		        $result = $this->db->update($query);

		        if ($result) {
		            return $msg = "<span class='success'>Post updated successfully..</span>";
		        } 
		        else {
		            return $msg = "<span class='error'>Post not updated !!</span>";
		        }
			} 
			else {
				return $msg = "<span class='error'>Field must not be empty</span>";
			}	
		}

		public function destroy($id) { //Delete Data/posts
			$query = "DELETE FROM posts WHERE id = '$id'";
		    $result = $this->db->delete($query);
		    if ($result) {
		        return $msg = "<span class='success'>Post deleted successfully..</span>";
		    } 
		    else {
		        $msg = "<span class='error'>Post not deleted !!</span>";
		        return $msg;
		 	}
		}

	}

?>