<?php
class Kolko extends Player
{
	/**
	 * Klasa odpowiada za instancję  gracza
	 * $char - znak gracza
	 */
	public $char = 'O';
	public function __construct($name)
	{
		parent::__construct($name);
	}
}