<?php
class Formate{
	public function formDate($date){
		return date('F j,Y, g:i a', strtotime($date));
	}

	public function textshorten($text,$limit=400){
		$text=$text;
		$text=substr($text, 0,$limit);
		$text=substr($text, 0, strrpos($text, ' '));
		$text=$text."...........";
		return $text;
	}
}
?>