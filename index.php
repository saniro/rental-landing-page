<?php
	require("functions/filter.php");
	if(!isset($_GET['route'])){
		$_GET['route'] = "";
	}
	session_start();
	switch (filter($_GET['route'])) {
		case '':
			require("view/l_landingpage.php");
			break;
		default:
			require("view/a_error404.php");
			break;
	}
?>