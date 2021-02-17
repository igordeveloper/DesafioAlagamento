<?php
include 'autoload.php';

use Classes\ReadFile;
use Classes\Flodding;

try {

	//Ler arquivo com especificações de casos e silhuetas
	$file = new ReadFile();
	$file->setPath("silhuetas.txt");
	$specification = $file->read();

	//dividir string separadas pela quebra de linha
	$lines = explode("\n", $specification);

	//Verificar se o numero de casos é um inteiro entre 1 e 100
	if(!is_numeric($lines[0]) || $lines[0] < 1 || $lines[0] > 100){
		throw new \Exception("Argumento inválido para quantidade de casos");
	}

	//percorrer as linhas do arquivo para criar os arrays com dados das silhuetas
	$c = 1;
	while ($c <= $lines[0] * 2) {


		$positions = explode(" ", $lines[$c+1]);

		//Veririca se o tamanho do array solicitado corresponde ao número de posições com alturas das silhuetas  
		if($lines[$c] == count($positions) && min($positions) > 0){			

			echo Flodding::calculate($lines[$c], $positions) . "<br>";

		}else{
			throw new \Exception("Argumento inválido para silhuetas");
		}
		$c+=2;
	}


} catch (Exception $e) {
	echo $e->getMessage();
}
