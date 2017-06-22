<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);


require_once('DNCManager.class.php');

$_dnc_url = null; // Default
if (isset($dev) && $dev != false) {
	$_dnc_url = 'http://dnc-system/dnc.api';
}
$_dnc = DncManager::shared('3E142E0EF6A7524090C9074A17F3A7A55AFD9FB8F60111E6143C9CC06A814005', $_dnc_url);

?>


