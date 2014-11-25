<?php

class Comment{
	
	public $id;
	public $postTitle;
	public $authorName;
	public $content;
	public $date;

	public function __construct($id, $postTitle, $authorName, $content, $date) {
		$this->id = $id;
		$this->postTitle = $postTitle;
		$this->authorName = $authorName;
		$this->content = $content;
		$this->date = $date;
	}
}

?>