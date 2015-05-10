<?php

if(isset($_POST['email_esqueceu'])) {

	require_once("config.php"); 

	$conectar = Banco::instanciar();
	$usuarios = $conectar->ListarTudo('usuarios');

	$verifica = false;
	
	for($i = 0; $i < count($usuarios); $i++){
		
		if($usuarios[$i]['email_usuario'] == $_POST['email_esqueceu']) {
			
			$mensagem = "Sua senha: " . base64_decode($usuarios[$i]['senha']);
			$mensagem .= "<br /><br />";
			$mensagem .= "Enviado pelo Sistema do Mapa da Vida."; 
			$mensagem .= "<br /><br />"; 
			$mensagem .= "Caso nao tenha pedido lembrete de senha, releva esse e-mail.";
			
			$headers = "From: Mapa da Vida" . "\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1rn";
			
			
			$assunto = "Lembre de Senha do Mapa da Vida";
			
			mail($_POST['email_esqueceu'],$assunto,$mensagem,$headers);
			
			$verifica = true;
			
			echo "<script type=\"text/javascript\">alert(\"Foi enviado um e-mail com sua senha!\"); location.href='/inicio'</script>" ;
			
			break;
		}	
	}
	
	if($verifica == false){
		
		echo"<script type=\"text/javascript\">alert(\"Esse e-mail nao existe, por favor digite o e-mail correto!\");</script>";
	}	
}

?>


<form  action="" ="formulario_esqueceu" name="formulario_esqueceu" method="POST">
	<label>E-mail</label> <input type="text" name="email_esqueceu" id="email_esqueceu" />
	<input type="submit" name="botao_esqueceu" id="botao_esqueceu" value="Enviar" />
</form>

<p><a href="/inicio">Voltar ao Inicio</a></p>