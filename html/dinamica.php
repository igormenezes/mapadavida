<?php

require_once("config.php"); 

$sessao = new Sessao();

$sessao->verificarSessao();

$informacoes = new Dados(); 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/html/css/geral.css" rel="stylesheet" type="text/css" />
<link href="/html/css/painel.css" rel="stylesheet" type="text/css" />
<title>Mapa da vida - Dinâmica em grupo</title>
<script src="/html/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="/html/js/validarDados.js" type="text/javascript"></script>
</head>
<body>
<div id="base">
	<div id="painel">
    <?php include "menu.inc" ?>
    <div id="conteudo">
    </div>
    <div id="gerar">
    <h1>Dinâmica das Oposições</h1>
    <form id="formulario2" name="formulario2" method="post" action="/salvar">
    <?php $informacoes->gerarLabel(); ?>
    <div id="sentimentos">Sentimentos Predominantes</div>
    <br />
    <h3>Sentimentos Egóicos</h3>
    <h4>Ego Sintônicos</h4>
	<label>O Sentimento do Próprio Valor</label>
    <?php $informacoes->gerarSentimentos(); ?>
 	<label>O Sentimento de Liberdade</label>
    <?php $informacoes->gerarSentimentos(); ?>       
    <label>A Vaidade</label>
	<?php $informacoes->gerarSentimentos(); ?>
    <label>O Contentamento e a Satisfação</label>
    <?php $informacoes->gerarSentimentos(); ?>
    <h4>Ego Distônicos</h4> 
	<label>O Sentimento de Desvalor</label>
	<?php $informacoes->gerarSentimentos(); ?>
    <label>O Sentimento de Frustação</label>
	<?php $informacoes->gerarSentimentos(); ?>
    <label>O Arrependimento</label>
	<?php $informacoes->gerarSentimentos(); ?>
    <label>O Sentimento de Abandono</label>
    <?php $informacoes->gerarSentimentos(); ?>                  	                       	            	    	            	    	            	                	            	    <label>A Vergonha</label>
	<?php $informacoes->gerarSentimentos(); ?>
	<br />
    <h3>Sentimentos Dirigidos ao Próximo</h3> 
    <h4>Simpatia</h4>
    <label>A Simpatia</label>
	<?php $informacoes->gerarSentimentos(); ?>
    <label>A Estima</label>
	<?php $informacoes->gerarSentimentos(); ?>
    <label>O Carinho</label>
	<?php $informacoes->gerarSentimentos(); ?>
    <label>O Amor</label>
	<?php $informacoes->gerarSentimentos(); ?>
    <label>A Compaixão</label>
	<?php $informacoes->gerarSentimentos(); ?>
    <h4>Valorização</h4>
    <label>A Confiança</label>
	<?php $informacoes->gerarSentimentos(); ?>
    <label>A Consideração e o Respeito</label>
	<?php $informacoes->gerarSentimentos(); ?>
    <label>A Admiração</label>
	<?php $informacoes->gerarSentimentos(); ?>
    <label>A Gratidão</label>
    <?php $informacoes->gerarSentimentos(); ?>
    <h4>Antipatia</h4>
    <label>A Antipatia</label>
	<?php $informacoes->gerarSentimentos(); ?>
	<label>A Aversão</label>
	<?php $informacoes->gerarSentimentos(); ?>
	<label>O Ódio</label>
	<?php $informacoes->gerarSentimentos(); ?>
    <label>O Ressentimento</label>
	<?php $informacoes->gerarSentimentos(); ?>
    <label>A Mágoa</label>
	<?php $informacoes->gerarSentimentos(); ?>
	<h4>Desvalorização</h4>
    <label>A Desconfiança</label>
	<?php $informacoes->gerarSentimentos(); ?>
    <label>O Despreso</label>
	<?php $informacoes->gerarSentimentos(); ?>
    <label>A Inveja</label>
	<?php $informacoes->gerarSentimentos(); ?>
    <label>O Ciúmes</label>
	<?php $informacoes->gerarSentimentos(); ?>
	<h4>Sentimentos de Temperamento</h4>
    <label>A Espera e a Esperança</label>
	<?php $informacoes->gerarSentimentos(); ?>
    <label>A Desesperança</label>
	<?php $informacoes->gerarSentimentos(); ?>
    <label>A Preocupação com o Futuro</label>
	<?php $informacoes->gerarSentimentos(); ?>
    <label>A Nostalgia e a Saúdade</label>
	<?php $informacoes->gerarSentimentos(); ?>
    <h5>Legenda</h5> 
    <?php $informacoes->criarLegenda(); ?> 
    <h8>T -</h8> <h7>Tênue</h7> 
    <h8>M -</h8> <h7>Moderado</h7> 
    <h8>E -</h8> <h7>Expressivo</h7> 
    <h8>F -</h8> <h7>Forte</h7>                                                                                               
    </form>
    </div>
    </div>
</div>
</body>
</html>