<?php
	//ouverture de session
	session_start();

	include_once("helpers/access.php");

    $whichTask = 'index';
    $whichControl = 'post';
    if(!empty($_GET['task'])) $whichTask = $_GET['task']; // get the task to call
    if(!empty($_GET['control'])) $whichControl = $_GET['control']; // get the control to use
    $controlPath = "controls/$whichControl.php";
    $controlClassName = ucfirst($whichControl).'Control';
    require_once("controls/$whichControl.php");
    $control = new $controlClassName();
    $control->$whichTask();
?>