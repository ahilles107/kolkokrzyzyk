<?php
/**
 * Podstawowy kontroler aplikacji.
 * - Ustawia sesję
 * - uruchamia autoloader
 */

session_start();
$autoload = array();
function __autoload($class_name) {
	static $autoload;
	include_once('autoload.array.php');

	if( isset( $autoload[ $class_name ] ) ) {
		include_once($autoload[ $class_name ]);
		return true;
	}
	return false;
}
$tpl = new Template();