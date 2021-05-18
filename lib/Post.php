<?php 
	include_once("Database.php");
	include_once("Format.php");
	include_once("File.php");
?>
<?php
	class Post {

		private $db;
		private $fm;
		
		public function __construct() {
			$this->db      = new Database();
			$this->fm      = new Format();
			$this->fileObj = new File();
		}

		public function show() {
	        $query = "SELECT posts.*, category.name FROM posts INNER JOIN category
					ON posts.cat = category.id ORDER BY posts.id";
	        $result = $this->db->select($query);

	        return $result;
		}

		public function store($data, $file) { 
			//$data = $_POST;
			//$_POST['cat'];
			//$data['cat'];

			if (!empty($data['cat']) && !empty($data['title']) && !empty($file['image']['name']) && !empty($data['content']) && !empty($data['tags']) && !empty($data['author'])) {
            	
            	//$cat = $data['cat'] == $cat = $_POST['cat'];

            	$cat     = $this->fm->validation($data['cat']);
            	$title   = $this->fm->validation($data['title']);
            	$content = $this->fm->validation($data['content']);
            	$tags    = $this->fm->validation($data['tags']);
            	$author  = $this->fm->validation($data['author']);

	            $image = $this->fileObj->uploadFile($file['image']);
	            if ($image == true) {
	                $file_tmp = $file['image']['tmp_name'];
	                $file_path = "uploads/";
	                $upload_img = $file_path.$image;
	               
	                move_uploaded_file($file_tmp, $upload_img);

	                $query = "INSERT INTO posts(cat, title, image, content, tags, author) 
	                         VALUES('$cat', '$title', '$upload_img', '$content', '$tags', '$author')";
	                $result = $this->db->insert($query);

	                if ($result) {
	                    return $msg = "<span class='success'>Post inserted successfully..</span>";
	                } 
	                else {
	                    return $msg = "<span class='error'>Post not inserted !!</span>";
	                }
	            }
	        }
	        else {
	            return $msg = "<span class='error'>Field must not be empty</span>";
	        }   
		}

		public function edit($id) {

		}

		public function update($data, $id) {
	
		}

		public function destroy($id) {

		}

	}

?>