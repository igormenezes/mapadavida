<?php

$configuracao = array(

	'servidor' => 'localhost',
	'banco' => 'blogi396_mapadavida',
	'usuario' => 'blogi396_root',
	'senha' => 'administrador123'
);

function __autoload($classe){

	require_once("classes/$classe.class.php");
}