<?php

class File {
	
	private $supportedFormats = ['image/jpg','image/jpeg','image/png','image/gif'];


	public function uploadFile($file){ //$_FILES['image']
		if (is_array($file)) {
			if ($file['size'] < 1048576) {
				if ($file['error'] < 1) {
					if (in_array($file['type'], $this->supportedFormats)) {
						$rnd = rand(0, 9999); 
						$file_name = explode('.', $file['name']);//new .2021 .04 .png
						$file_type = strtolower(end($file_name));
						$file = $rnd.'.'.$file_type;

						return $file;
					} 
					else {
						echo "<span color='red'>File format no match. Allowed only : (jpg, jpeg, png, gif) !!</span>";
					}
				}
				 else {
					echo "<span color='red'>Please select an image!!</span>";
				}
			} 
			else {
				echo "<span color='red'> File size should be less than 1MB !!</span>";
			}
		} 
		else {
			echo "<span color='red'> No file was uploaded !!</span>";
		}
		
	}
}


/*
new-01 .png PNG
1MB = 1024*1024
$file = $_FILES['image'];
$_FILES['image']['name']
$_FILES['image']['size']
$_FILES['image']['error']
$_FILES['image']['tmp_name']
$_FILES['image']['type']*/


?>