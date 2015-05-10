<?php

require_once("config.php"); 

$form = new Formulario();

if(isset($_POST['qt_participante']) && !isset($_POST['qt_psicologo'])) {

$form->listarParticipantes();

}

elseif(isset($_POST['qt_psicologo']) && !isset($_POST['qt_participante'])) {

$form->listarPsicologos();

}

