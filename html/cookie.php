<?php

require_once("config.php"); 

$cookie = new Cookie();

$cookie->armazenarCookie($_POST);
	
header("location:/dinamica");
