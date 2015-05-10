<?php

if(isset($_POST['login']) && isset($_POST['senha'])) {

	require_once("config.php");

	$sessao = new Sessao();

	$sessao->iniciarSessao($_POST['login'],$_POST['senha']);

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/html/css/geral.css" rel="stylesheet" type="text/css" />
<link href="/html/css/index.css" rel="stylesheet" type="text/css" />
<title>Mapa da vida - Dinâmica em grupo</title>
</head>
<body>
<div id="base">
	<div id="mapadavida">
    	<div class="logo">
        	<img src="/imagens/logo.png" width="346" height="344" title="Mapa da vida" alt="Mapa da vida" />
        </div>
    	<form id="verificacao" method="post">
        	<label id="label">Login:</label> <input id="login" name="login" type="text" />
            <br /><br />
            <label id="label">Senha:</label> <input id="senha" name="senha" type="password" />
            <br /><br />
            <input id="entrar" value="Entrar" type="submit" />
        </form>
        <p id="esqueceu"><a href="/esqueceu">Esqueceu sua senha?</a></p>
    </div>
</div>
</body>
</html>