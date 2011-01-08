<?php 
class Krzyzyk extends Player
{
	/**
	 * Klasa odpowiada za instancję  gracza
	 * $char - znak gracza
	 */
	public $char = 'X';
	public function __construct($name)
	{
		parent::__construct($name);
	}
}

