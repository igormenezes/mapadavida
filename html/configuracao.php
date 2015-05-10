<?php

require_once("config.php"); 

$sessao = new Sessao();

$sessao->verificarUsuarioMaster();


if(isset($_POST['nome_usuario']) && isset($_POST['email_usuario']) && isset($_POST['login_usuario']) && isset($_POST['senha_usuario'])) {
	
	$alterar = new Adicionar();
	$alterar->adicionarUsuario();
}

if(isset($_POST['busca'])){
	
	$pesquisar = new Pesquisar();

	$mensagem = $pesquisar->pesquisarDados();
}

// se alterou o usuario mestre ele da um alert que foi alterado com sucesso, pois o session_start não deixa usar o echo

if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] == "http://localhost/editar/1"){
	
	echo "<script type=\"text/javascript\">alert(\"Alteração de usuario realizada com sucesso!\");</script>";
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/html/css/geral.css" rel="stylesheet" type="text/css" />
<link href="/html/css/painel.css" rel="stylesheet" type="text/css" />
<title>Mapa da vida - Dinâmica em grupo</title>
<script src="/html/js/jquery-1.7.1.min.js" type="text/javascript"></script>
</head>
<body>
<div id="base">
	<div id="painel">
    <?php include "menu.inc" ?>
    <div id="conteudo">
    	<div id="listar">
    		<form id="pesquisar" action="" method="POST">
   				<input name="busca" type="text">
  		 		<input type="Submit" value="Procurar">
			</form>
    		<p>
    		<?php 
    		
    		$conectar = new Listar(); 
    		$registros = $conectar->quantidadeDados();
			
			if(count($registros) > 1){
				
				echo "Existem " . "<strong>" . count($registros) . "</strong>" . " registros cadastrados";	
			} 
			
			else{
				
				echo "Existe " . "<strong>" . count($registros) . "</strong>" . " registro cadastrado";
			}
    		
    		?>	
    		</p>
    		<br />
    		<p><a href="/configuracao">Ver todos os usuarios</a></p>
    		<br />
    		<p><a href="/inserir">Adicionar novo usuario</a></p>
    		<br />
    		<?php 
    		
    		if(isset($_POST['busca'])){
    				
				if(is_array($mensagem)) {
						
					foreach($mensagem as $valor) {
						
						print_r($valor);
					}
				}
					
				else {
						
					echo $mensagem;
				}
    		}
			
    		?>
    		<?php if(!isset($_POST['busca'])){$listar = new Listar(); $listar->listarDados();} ?>	
    	</div>
    </div>
    </div>
</div>
</body>
</html>