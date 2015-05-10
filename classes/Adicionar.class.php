<?php

class Adicionar {
	
	public function adicionarUsuario() {
		
		try{
			
			$conectar = Banco::instanciar();
			$informacoes = $conectar->listarTudo('usuarios');
			
			$oque = array(
			
				'nome_usuario' => $_POST['nome_usuario'],
				'email_usuario' => $_POST['email_usuario'],
				'login' => $_POST['login_usuario'],
				'senha' => base64_encode($_POST['senha_usuario'])
			);
			
			for($i = 0; $i < count($informacoes); $i++){
				
				if($informacoes[$i]['login'] == $_POST['login_usuario']) {
					
					echo"<script type=\"text/javascript\">alert(\"Esse login já existe, por favor inserir outro!\");</script>";
					
					return false;
				}
			}
			
			$conectar->inserir($oque,'usuarios');
			
			echo "<script type=\"text/javascript\">alert(\"Cadastro de usuario realizado com sucesso!\"); location.href='/configuracao'</script>" ;
		}
		
		catch(Exception $mensagem) {
				
			die ("Não foi possivel cadastrar novo usuario!" . $mensagem->getLine() . ' # ' . $mensagem->getFile() . ' # ' . $mensagem->getMessage());
		}	
	}
}
