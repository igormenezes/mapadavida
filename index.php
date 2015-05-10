<?php
	
//declarar variavel para o get que tem a url amigavel

$url = $_GET['url'];
	
//divide a url pelas barras para pegar cada valor isolado
	
$url = explode("/", $url);
	
//verifica se o primeiro parametro da url tem algum valor, se existir atribui o valor a variavel pagina
	
if ($url[0] != '') { 
	
	$pagina = $url[0]; 
	
} 
	
// caso contrario o valor de pagina é home
	
else { 
	
	$pagina = "inicio";
	
}
	
//atribui valor da pasta
	
$pasta = 'html';
	
//se existir o caminho do arquivo ele executa o arquivo
	
if(file_exists("$pasta/$pagina.php")) {
	
	require_once("$pasta/$pagina.php");
	
}
	
//caso contrario imprimi uma mensagem na tela
	
else {
	
	echo "Essa p&aacute;gina n&atilde;o existe, por favor verifica o endere&ccedil;o digitado!";
	
}
