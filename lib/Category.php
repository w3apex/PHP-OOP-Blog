<?php 
	include("Database.php");
	include("Format.php");
?>

<?php
	class Category {

		private $db;
		private $fm;
		
		public function __construct() {
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function show() { //Get all Data/Categories 
			$query = "SELECT * FROM category ORDER BY id DESC";
	        $result = $this->db->select($query);

	        return $result;
		}

		public function store($data) { //Insert Data/Category
			$name = $this->fm->validation($data);

			if (!empty($name)) {
				$query = "INSERT INTO category(name) VALUES('$name')";
				$catInsert = $this->db->insert($query);

				if ($catInsert) {
	                return $msg = "<span class='success'>Category inserted successfully..</span>";
	            } 
	            else {
	                return $msg = "<span class='error'>Category not inserted !!</span>";
	            }
			} 
			else {
				return $msg = "<span class='error'>Field must not be empty</span>";
			}   
		}

		public function edit($id) { //Get single Data/Categories
			$query = "SELECT * FROM category WHERE id = '$id'";
            $result = $this->db->select($query);

            return $result;
		}

		public function update($data, $id) { //Update Data/Category
			$name = $this->fm->validation($data);

			if (!empty($name)) {
				$query = "UPDATE category SET name = '$name' WHERE id = '$id'";

		        $result = $this->db->update($query);

		        if ($result) {
		            return $msg = "<span class='success'>Category updated successfully..</span>";
		        } 
		        else {
		            return $msg = "<span class='error'>Category not updated !!</span>";
		        }
			} 
			else {
				return $msg = "<span class='error'>Field must not be empty</span>";
			}	
		}

		public function destroy($id) { //Delete Data/Category
			$query = "DELETE FROM category WHERE id = '$id'";
		    $result = $this->db->delete($query);
		    if ($result) {
		        return $msg = "<span class='success'>Category deleted successfully..</span>";
		    } 
		    else {
		        $msg = "<span class='error'>Category not deleted !!</span>";
		        return $msg;
		 	}
		}

	}

?>