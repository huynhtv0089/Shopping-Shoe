<?php
	// require_once 'config.php';
	// require_once 'librarys/Bootstrap.php';

	require_once 'define.php';

	function __autoload($className) {
		require_once LIBRARY_PATH . "{$className}.php";
	}
	error_reporting  (E_ERROR | E_WARNING | E_PARSE);
    ob_start();
	$bootstrap = new Bootstrap();
?>