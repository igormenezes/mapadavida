<?php

require_once("config.php"); 

$sessao = new Sessao();

$sessao->verificarSessao();

/*instanciar a classe PDF*/

$relatorio = new Relatorio();

/*chama a funcao gerarMedias*/

$relatorio->gerarMedias();

