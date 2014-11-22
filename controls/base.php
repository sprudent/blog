<?php

class BaseControl {

	protected $model;
	protected $vars = array();
	protected $name;

	public function __construct($name) {
		$this->name = $name;
		$modelClass = ucfirst($this->name).'Model';
		require_once('models/'.$this->name.'.php');
		$this->model = new $modelClass();
	}

	public function getVars() {
		return $this->vars;
	}

	public function getVar($key) {
		return $this->vars[$key];
	}

	public function render($view) {
		extract($this->vars);

		include_once('views/partials/header.php');

		$viewPath = 'views/'.$this->name.'s/'.$view.'.php';
		if(file_exists($viewPath)) {
			include_once($viewPath);
		} else {
			die('view at '.$viewPath.' does not exists');
		}

		include_once('views/partials/footer.php');
	}
}

?>