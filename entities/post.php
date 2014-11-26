<?php

class Post{
	
	public $id;
	public $title;
	public $subtitle;
	public $introduction;
	public $content;
	public $authorName;
	public $like;
	public $date;

	public function __construct($id, $title, $subtitle, $introduction, $content, $authorName, $like, $date) {
		$this->id           = $id;
		$this->title        = $title;
		$this->subtitle     = $subtitle;
		$this->introduction = $introduction;
		$this->content      = $content;
		$this->authorName   = $authorName;
		$this->like         = $like;
		$this->date         = $date;
	}
}

?>