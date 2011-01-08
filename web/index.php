<?php
// załączamy podstawowy kontroler
include_once( '../app/classes/vendor/Controller.php' );
$board = new Board(); // tworzymy obiekt tablicy do gry
$boardArr = $board->getBoard(); //pobieramy tablice do gry 

$player = new Player(); // tworzymy instancję gracza (ogólną)
$player1 = new Kolko(); // tworzymy instancję gracza Kolko bez parametru spróbuje pobrać istniejacego
$player2 = new Krzyzyk(); // tworzymy instancję gracza Krzyzyk bez parametru spróbuje pobrać istniejacego

// jeśli nie ma tablicy do gry wyświetlamy prosbe o przedstawienie się
if(count($boardArr) == 0)
{
	
	if($_POST['player1']  || $_POST['player2'])
	{
		$board->configure();  // tworzymy tablice do gry
		$boardArr = $board->getBoard();  // pobieramy ją
		$player1 = new Kolko($_POST['player1']);  // tworzymy nowego gracza Kolko
		$player2 = new Krzyzyk($_POST['player2']); // tworzymy nowego gracza Krzyzyk
		$player1->setActive();  // Ustawiamy aktywnego gracza na Kolko
	}
	else 
	{
		echo $tpl->get('invite');  // wyświetlamy template invite
		return;
	}
}
else 
{
	// Jeśli w requescie mamy row and field then, starting the game
	if(isset($_POST['row'])  || isset($_POST['field']))
	{	
		// If player Kolko is active
		if($player->getActive() == 'Kolko')
		{
			$pp = $player2; // do zmiennej pp przypisujemy obiekt aktywnego gracza
			$char = $player1->char; // pobieramy znak gracza
		}
		else
		{
			$pp = $player1; // do zmiennej pp przypisujemy obiekt aktywnego gracza
			$char = $player2->char; // pobieramy znak gracza
		}
		// Ustawiamy wybrane przez gracza pole
		$board->setField(array('row' => $_POST['row'], 'field' => $_POST['field'], 'value' => $char));
		$boardArr = $board->getBoard();  // aktualizujemy zmienną z tablicą
		$pp->setActive(); // Zmieniamy aktywnego gracza
	}
}

$playerName = $player->getName($player->getActive());
echo $tpl->get('board', array('board' => $boardArr, 'player' => $playerName)); // Wyświetlamy template z plansza gry
