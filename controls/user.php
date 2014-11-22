<?php

require_once('controls/base.php');

class UserControl extends BaseControl{

	public function __construct() {
		parent::__construct('user');
	}

	public function connect() {
        if(!empty($_POST['login']) && !empty($_POST['pass'])) {	           
        	$connexionInfos = $this->model->get($_POST['login'], $_POST['pass']);
	        if($connexionInfos) { 
                $_SESSION['user'] = $connexionInfos;
            }
        }
        header("Location: ".$_SERVER['HTTP_REFERER']);
	}

	public function disconnect() {
		session_destroy();
		header("Location: index.php");
	}
}	

?>