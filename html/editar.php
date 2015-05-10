<?php

require_once("config.php"); 

$sessao = new Sessao();

$sessao->verificarSessao();

if(isset($_POST['nome_usuario'])) {
	
	$alterar = new Alterar();
	$alterar->alterarUsuario();
}

elseif(isset($_POST['estado_civil'])){
	
	$alterar = new Alterar();
	$alterar->alterarRegistro();
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
<script src="/html/js/validarUsuarios.js" type="text/javascript"></script>
<script src="/html/js/validarRegistros.js" type="text/javascript"></script>
</head>
<body>
<div id="base">
	<div id="painel">
    <?php include "menu.inc" ?>
    <div id="conteudo">
    	<div id="listar">
    		<?php 
    		
    		$url_anterior = explode("/",$_SERVER['HTTP_REFERER']);
			
			if($url_anterior[3] == 'configuracao'){
				
				$alterar = new Alterar(); 
    			$alterar->gerarFormularioUsuario(); 	
			}
			
			elseif($url_anterior[3] == 'registro'){
				
				$alterar = new Alterar(); 
    			$alterar->gerarFormularioRegistro(); 	
			}
			
			else{
			
				die("Erro para gerar formulario para alterar dados!");
			}			
						
    		?>	
    	</div>
    </div>
    </div>
</div>
</body>
</html>