<?

if (!defined ("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

define('MY_DEFAULT_TEMPLATE_PATH', '/local/templates/.default/');

if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/event_handlers.php')) {
    require_once($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/event_handlers.php');
}

if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/set_title.php')) {
    require_once($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/set_title.php');
}
