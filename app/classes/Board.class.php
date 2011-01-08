<?php 
class Board
{
	/**
	 * Klasa odpowiada za obsługe tablicy do gry
	 */
	private $board = false;
	
	public function configure()
	{
		for($row = 0; $row <= 2; $row++)
		{
			for($field= 0; $field <= 2; $field ++)
			{
				$temp[$row][$field] = null;
			}
		}
		$_SESSION['board'] = $temp;
	}
	/**
	 * Pobieranie tablic z sesji
	 */
	public function getBoard()
	{
		return $_SESSION['board'];
	}
	
	/**
	 * 
	 * Ustawianie tablicy do sesji
	 * @param array $data
	 */
	private function setBoard($data)
	{
		$_SESSION['board'] = $data;
	}
	/**
	 * 
	 * Ustawianie wybranego przez usera pola
	 * @param array $data
	 */
	public function setField($data)
	{
		if($data['row'] < 3 && $data['field'] < 3)
			$_SESSION['board'][$data['row']][$data['field']] = $data['value'];
			
		if($win = $this->Win($data['value']))
		{
			$_SESSION['win'] = $win;
		}
	}
	
	/**
	 * Sprawdzanie czy aktualny uzytkownik nie wygrał
	 * @param mixed (bool, string) $char
	 */
	public function Win($char)
	{		
		$player = new Player();
		$active  = $player->getActive();			

		$b = $this->getBoard();
		
		echo $char;
		echo $active;
		
		
		if($b[0][0] == $char && $b[0][1] == $char && $b[0][2] )
			return $active;
		if($b[1][0] == $char && $b[1][1] == $char && $b[1][2] )
			return $active;
		if($b[2][0] == $char && $b[2][1] == $char && $b[2][2] )
			return $active;
			
		if($b[0][0] == $char && $b[1][0] == $char && $b[2][0] )
			return $active;
		if($b[0][1] == $char && $b[1][1] == $char && $b[2][1] )
			return $active;
		if($b[0][2] == $char && $b[1][2] == $char && $b[2][2] )
			return $active;
			
		if($b[0][0] == $char && $b[1][1] == $char && $b[2][2] )
			return $active;
		if($b[0][2] == $char && $b[1][1] == $char && $b[2][1] )
			return $active;
		
		return false;
	}
}
?>