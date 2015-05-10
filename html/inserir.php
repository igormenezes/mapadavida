<?php

require_once("config.php"); 

$sessao = new Sessao();

$sessao->verificarSessao();

if(isset($_POST['nome_usuario']) && isset($_POST['email_usuario']) && isset($_POST['login_usuario']) && isset($_POST['senha_usuario'])) {
	
	$alterar = new Adicionar();
	$alterar->adicionarUsuario();
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
</head>
<body>
<div id="base">
	<div id="painel">
    <?php include "menu.inc" ?>
    <div id="conteudo">
    	<div id="listar">
    	<form action ="" method="post" id="formulario3" name="formulario_usuario">
			  <label>Nome Usuario</label> <input type="text" id="nome_usuario" name="nome_usuario" />
			  <br /><br />
			  <label>E-mail</label> <input type="text" id="email_usuario" name="email_usuario" />
			  <br /><br />
			  <label>Login</label> <input type="text" id="login_usuario" name="login_usuario" />
			  <br /><br />
			  <label>Senha</label> <input type="password" id="senha_usuario" name="senha_usuario" />
			  <br /><br />
			  <input type="button" onClick="validarUsuarios()" name="envia_usuarios" id="envia_usuarios" value="Enviar">	
    	</div>
    </div>
    </div>
</div>
</body>
</html>