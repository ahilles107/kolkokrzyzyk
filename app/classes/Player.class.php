<?php 
class Player
{
	/**
	 * Klasa odpowiadająca za obsługę graczy
	 */
	private $name;
	
	/**
	 * 
	 * Konstruktor - tworzenie gracza przy inicjacji klasy
	 * @param string $name
	 */
	public function __construct($name = null)
	{
		if(!isset($_SESSION['player'][get_class($this)]['name']) && get_class($this) != 'Player')
			$_SESSION['player'][get_class($this)]['name'] = $name;
	}
	
	/**
	 * 
	 * Pobieranie nazwy gracza
	 * @param string $type
	 */
	public function getName($type = null)
	{
		if($type == null)
			$type = get_class($this);
		return $_SESSION['player'][$type]['name'];
	}
	
	/**
	 * Ustawianie nazwy klasy (typu) aktywnego gracza
	 */
	public function setActive()
	{
		$_SESSION['player']['active'] = get_class($this);
	}
	
	/**
	 * Pobieranie nazwy klasy (typu) aktywnego gracza
	 */
	public function getActive()
	{
		return $_SESSION['player']['active'];
	}
	
}
?>