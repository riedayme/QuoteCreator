<?php define('BASEPATH', true); // protect script from direct access

require "includes/helper.php";
require "includes/config.php";

switch (@$_GET['module']) {	
	default:
	include "modules/app.php";
	break;
}
?>