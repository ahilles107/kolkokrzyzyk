<?php
/**
 * Funkcja zczytująca pliki klas z katalogu w aplikacji
 * - Tworzy tempowy plik z tablica klas i ich ścieżek 
 */
set_time_limit(0);
$klasa = array();
$path = '../../../app/classes';
$dir = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::SELF_FIRST
);
 
//przetwarzanie plików
foreach($dir as $file) {
	if( $file->isFile() and end( explode( '.', $file->getFilename() ) ) == 'php' and strpos($file->getFilename(), '%') === false and strpos( $file->getPath().'/'.$file->getFilename(), '.git') === false) {
        $tokens = token_get_all( file_get_contents( $file->getPath().'/'.$file->getFilename() ) );
        $count = count($tokens);
        for($a=0; $a<$count;$a++ ) {
            if( is_numeric( $tokens[$a][0] ) ) {
                if( $tokens[$a][0] == T_CLASS and $tokens[$a+1][0] == T_WHITESPACE and $tokens[$a+2][0] == T_STRING ) {
                    if( isset( $klasy[ trim( $tokens[$a+2][1] ) ] ) ) {
                        $double[] = array( trim( $tokens[$a+2][1] ), $file->getPath().'/'.$file->getFilename() );
                    } else {
                        $klasy[ trim( $tokens[$a+2][1] ) ] = $file;
                    }
                }
            }
        }
	}
}

file_put_contents('autoload.array.php', "<?php\n");
foreach( $klasy as $class => $file ) {
	file_put_contents('autoload.array.php', '$autoload[\''.$class.'\'] = \''.str_replace( getcwd(), '.', realpath($file)).'\';'."\n", FILE_APPEND);
}?>