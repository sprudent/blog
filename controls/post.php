<?php

require_once('controls/base.php');

class PostControl extends BaseControl{

	public function __construct() {
		parent::__construct('post');
	}

	public function index() {
		$this->vars['posts'] = $this->model->listAll();
		$this->render('index');
	}

	public function suppression() {
		if(empty($_GET['id']) || !is_numeric($_GET['id']) || !AccessHelper::isAdmin()) {
			header("Location: index.php");
		} else {
	    	$this->model->remove($_GET['id']);
	    	header('Location: index.php'); 
		}

	}

	public function article() {
		if(empty($_GET['id']) || !is_numeric($_GET['id'])) {
			header("Location: index.php");
		}
		$this->vars['post'] = $this->model->get($_GET['id']);
        $this->render('article');
	}

	public function like() {
		if(empty($_GET['id']) || !is_numeric($_GET['id'])) {
			header("Location: index.php");
		} else {
			$errorMessage = "Erreur : Le vote n'a pas été pris en compte";
			$success = $this->model->like($_GET['id']); 
			
			echo json_encode(array("success"=>$success, "errorMessage"=>$errorMessage));
			exit();
		}
	}

	public function creation() {
		$this->initVarsForCreationOrModification();
		if(!AccessHelper::isAdmin()) {
	        header("Location: index.php");
	        exit();
	    }
		if(!empty($_POST['submit'])) {

			$this->vars['title']        = $_POST['title'];
			$this->vars['subtitle']     = $_POST['subtitle'];
			$this->vars['introduction'] = $_POST['introduction'];
			$this->vars['content']      = $_POST['content'];
			$this->vars['error']        = '';

	        if(empty($this->vars['title']) || empty($this->vars['subtitle']) || empty($this->vars['introduction']) || empty($this->vars['content'])) {	           
				$this->vars['error']        = "Erreur : un champs n'est pas remplit";
	        } else if($this->model->add($this->vars['title'], $this->vars['subtitle'], $this->vars['introduction'], $this->vars['content'])) { 
                header("Location: index.php"); // success
            } else {
                $this->vars['error'] = " Erreur : l'article n'a pas été ajouté";
            }
    	} 
    	$this->render('creation'); 
	}

	public function modification() {
		$this->initVarsForCreationOrModification();

	    if(empty($_GET['id']) || !is_numeric($_GET['id']) || !AccessHelper::isAdmin()) {
	        header("Location: index.php");
	        exit();
	    }
	    if(!empty($_POST['submit'])) {

			$this->vars['title']        = $_POST['title'];
			$this->vars['subtitle']     = $_POST['subtitle'];
			$this->vars['introduction'] = $_POST['introduction'];
			$this->vars['content']      = $_POST['content'];
			$this->vars['error']        = "";

	        if(empty($this->vars['title']) || empty($this->vars['subtitle']) || empty($this->vars['introduction']) || empty($this->vars['content'])) {
	            $this->vars['error'] = "Erreur : un champs n'est pas remplit";
	        } else if($this->model->update($_GET['id'], $this->vars['title'], $this->vars['subtitle'], $this->vars['introduction'], $this->vars['content'])) { 
                header("Location: index.php"); // success
                exit();
            } else {
                $this->vars['error'] = " Erreur : l'article n'a pas été créé";
            }
	    } else {
	        $this->vars['post'] = $this->model->get($_GET['id']);
	    } 
	    $this->render('modification');
	}

	private function initVarsForCreationOrModification() {
		$this->vars['title']        = '';
		$this->vars['subtitle']    = '';
		$this->vars['introduction'] = '';
		$this->vars['content']      = '';
		$this->vars['error'] 		= '';
	}
}
?>