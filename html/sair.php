<?php

require_once("config.php");

$cookie= new Cookie();

$cookie->apagarCookie($_COOKIE);

$sessao = new Sessao();

$sessao->apagarSessao();