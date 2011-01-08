<?php
class Template
{
	/**
	 * Klasa obsługująca pisany na kolanie system szablonów.
	 */
	private $layout = 'layout';
    function __construct()
    {
    }
    
 	/**
 	 * 
 	 * Funkcja wybierająca wyświetlany szablon
 	 * 	Pobiera wybrany template i ustawia go w layoucie
 	 * 	Pobiera ustawiony layout (brakuje metody do zmiany domyślnego layoutu)
 	 * @param string $path
 	 * @param array $params
 	 */
    function get($path, $params = array())
    {
		return $this->getLayout($this->layout, array('content' => $this->getTemplate($path, $params)));
    }
    
    private function getLayout($path, $params = array())
    {
    	ob_start();
        extract($params);
        include ('../app/templates/layouts/'.$path.'.php');
        return ob_get_clean();
    }
    
    private function getTemplate($path, $params = array())
    {
    	ob_start();
        extract($params);
        include ('../app/templates/'.$path.'Success.php');
        return ob_get_clean();
    }
}