<?php

namespace Classes;

/**
 * 
 */
class ReadFile
{
	private $path;

	public function setPath(string $path){
		$this->path = $path;
	}

	public function read(){

		if(!file_exists($this->path)){
			throw new \Exception("Arquivo não encontrado");
		}

		$fileOpen = fopen($this->path, "r");

		if(!$fileOpen){
			throw new \Exception('Falha ao abrir arquivo');
		}

		$str = stream_get_contents($fileOpen);

		fclose($fileOpen);

		return $str;
	}
}