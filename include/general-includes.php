<?php

	session_start();

	error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);

	require_once 'global-declarations.php';

	require_once 'class/clsconnection.php';

	require_once 'class/clscommon.php';

	require_once 'class/clsform-validation.php';

	require_once 'class/clspaging-sorting.php';

	connection::open_connection();
?>