<?php

require_once("config.php"); 

$sessao = new Sessao();

$sessao->verificarSessao();

$deletar = new Apagar();

$deletar->apagarDados();
