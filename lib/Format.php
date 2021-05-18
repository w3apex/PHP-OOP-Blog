<?php

class Format {
	
	public function formatDate($date) {
		return date('F j, Y', strtotime($date));
	}

	public function readMore($text, $limit = 300) {
		$string = $text." ";
		$string = substr($string, 0, $limit);
		$string = $string."...";
		return $string;
	}

	public function validation($data) {
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);

		return $data;
	}
}










?>