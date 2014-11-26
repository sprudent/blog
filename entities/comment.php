<?php

class Comment{
	
	public $id;
	public $postTitle;
	public $authorName;
	public $content;
	public $date;
	public $like;

	public function __construct($id, $postTitle, $authorName, $content, $date, $like) {
		$this->id         = $id;
		$this->postTitle  = $postTitle;
		$this->authorName = $authorName;
		$this->content    = $content;
		$this->date       = $date;
		$this->like       = $like; 
	}
}

?>