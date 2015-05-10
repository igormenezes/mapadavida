<?php

require_once("config.php"); 

$sessao = new Sessao();

$sessao->verificarSessao();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/html/css/geral.css" rel="stylesheet" type="text/css" />
<link href="/html/css/painel.css" rel="stylesheet" type="text/css" />
<title>Mapa da vida - Dinâmica em grupo</title>
<script src="/html/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="/html/js/ajax.js" type="text/javascript"></script>
<script src="/html/js/validarFormulario.js" type="text/javascript"></script>
</head>
<body>
<div id="base">
	<div id="painel">
		<div class="logo">
          <img src="/imagens/logo.png" width="346" height="344" title="Mapa da vida" alt="Mapa da vida" />
          </div>
        <ul class="menu">
          <li><a href="javascript:ajax();">Começar</a></li>
          <li><a href="/registro" onclick="mensagem({$_SERVER['HTTP_REFERER']});">Registros</a></li>
          <li><a href="/configuracao">Configurações</a></li>
          <li><a href="/sair">Sair</a></li>
        </ul>
        <div id="conteudo"></div>
    </div>       
</div>
</body>
</html>