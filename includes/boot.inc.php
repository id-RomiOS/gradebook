<?php

require_once  ROOT_DIR . '/includes/common.inc.php';
require_once  ROOT_DIR . '/includes/database.inc.php';
require_once  ROOT_DIR . '/includes/elements.inc.php';

define('BASE_URL', base_url());
define('REQUEST_TIME', (int) $_SERVER['REQUEST_TIME']);
define('IP_ADDRESS', $_SERVER['REMOTE_ADDR']);

$message = array();


?>