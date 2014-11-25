<?php

require_once('controls/base.php');

class CommentControl extends BaseControl{

	public function __construct() {
		parent::__construct('comment');
	}

	public function add() {

	}

	public function displayComments() {
		if(empty($_GET['id']) || !is_numeric($_GET['id'])) {
			header("Location: index.php");
		} else {
			echo json_encode($this->model->listByPost($_GET['id']));	
			exit();
		}
	}

	public function addComments() {
		
	}
}	

?>