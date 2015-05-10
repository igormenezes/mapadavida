<?php

class Alterar {
	
	public function gerarFormularioUsuario(){
		
		global $url;
		
		$conectar = Banco::instanciar();
		
		$imprimir = $conectar->listarId('usuarios',$url[1]);
			
		$descriptar = base64_decode($imprimir['senha']);
			
		echo "<form action =\"\" method=\"post\" id=\"formulario3\" name=\"formulario_usuario\">
			  <label>Nome Usuario:</label> <input type=\"text\" id=\"nome_usuario\" name=\"nome_usuario\" value=\"{$imprimir['nome_usuario']}\" />
			  <br /><br />
			  <label>E-mail:</label> <input type=\"text\" id=\"email_usuario\" name=\"email_usuario\" value=\"{$imprimir['email_usuario']}\" />
			  <br /><br />
			  <label>Login:</label> <input type=\"text\" id=\"login_usuario\" name=\"login_usuario\" value=\"{$imprimir['login']}\" />
			  <br /><br />
		      <label>Senha:</label> <input type=\"password\" id=\"senha_usuario\" name=\"senha_usuario\" value=\"{$descriptar}\" />
			  <br /><br />
			  <input type=\"button\" onClick=\"validarUsuarios()\" name=\"envia_usuarios\" id=\"envia_usuarios\" value=\"Enviar\">
			";			
	}

	public function gerarFormularioRegistro(){
		
		global $url;
		
		$conectar = Banco::instanciar();
		
		$imprimir = $conectar->listarId('registros',$url[1]);
			
		echo "<form action =\"\" method=\"post\" id=\"formulario3\" name=\"formulario_usuario\">
			  <label>Estado Civil:</label> <input type=\"text\" id=\"estado_civil\" name=\"estado_civil\" value=\"{$imprimir['estado_civil']}\" />
			  <br /><br />
			  <label>Profissão da Esposa:</label> <input type=\"text\" id=\"profissao_esposa\" name=\"profissao_esposa\" value=\"{$imprimir['profissao_esposa']}\" />
			  <br /><br />
			  <label>Idade:</label> <input type=\"text\" id=\"idade\" name=\"idade\" value=\"{$imprimir['idade']}\" />
			  <br /><br />
			  <label>Profissão:</label> <input type=\"text\" id=\"profissao\" name=\"profissao\" value=\"{$imprimir['profissao']}\" />
			  <br /><br />
			  <label>Telefone:</label> <input type=\"text\" id=\"telefone\" name=\"telefone\" value=\"{$imprimir['telefone']}\" />
			  <br /><br />
			  <label>E-mail:</label> <input type=\"text\" id=\"email\" name=\"email\" value=\"{$imprimir['email']}\" />
			  <br /><br />
			  <label>Numero de Filhos:</label> <input type=\"text\" id=\"numero_filhos\" name=\"numero_filhos\" value=\"{$imprimir['numero_filhos']}\" />
			  <br /><br />
			  <label>Numero de Irmãos:</label> <input type=\"text\" id=\"numero_irmaos\" name=\"numero_irmaos\" value=\"{$imprimir['numero_irmaos']}\" />
			  <br /><br />
			  <label>Observação:</label> <input type=\"text\" id=\"observacao\" name=\"observacao\" value=\"{$imprimir['observacao']}\" />
			  <br /><br />
			  <input type=\"button\" onClick=\"validarRegistros()\" name=\"envia_usuarios\" id=\"envia_usuarios\" value=\"Enviar\">
			";		
	}
	
	public function alterarUsuario() {
			
		try{
				
			global $url;
				
			$oque = array(
				
				'nome_usuario' => $_POST['nome_usuario'],
				'email_usuario' => $_POST['email_usuario'],
				'login' => $_POST['login_usuario'],
				'senha' => base64_encode($_POST['senha_usuario'])
				
			);
				
			$conectar = Banco::instanciar();
			$conectar->atualizar($oque,'usuarios',$url[1]);
				
			if($url[1] == 1) {
					
				$sessao = new Sessao();
				$sessao->iniciarSessao($_POST['login_usuario'],$_POST['senha_usuario']);	
			}
				
			echo "<script type=\"text/javascript\">alert(\"Alteração de usuario realizada com sucesso!\"); location.href='/configuracao'</script>";	
		}
			
		catch(Exception $mensagem){
				
			die ("Não foi possivel alterar valores do usuario! " . $mensagem->getLine() . ' # ' . $mensagem->getFile() . ' # ' . $mensagem->getMessage());
		}						
	}
	
	public function alterarRegistro(){
		
		try{
				
			global $url;
				
			$oque = array(
				
				'estado_civil' => $_POST['estado_civil'],
				'profissao_esposa' => $_POST['profissao_esposa'],
				'idade' => $_POST['idade'],
				'profissao' => $_POST['profissao'],
				'telefone' => $_POST['telefone'],
				'email' => $_POST['email'],
				'numero_filhos' => $_POST['numero_filhos'],
				'numero_irmaos' => $_POST['numero_irmaos'],
				'observacao' => $_POST['observacao']
				
			);
				
			$conectar = Banco::instanciar();
			$conectar->atualizar($oque,'registros',$url[1]);
				
			echo "<script type=\"text/javascript\">alert(\"Alteração de registro realizada com sucesso!\"); location.href='/registro'</script>";	
		}
			
		catch(Exception $mensagem){
				
			die ("Não foi possivel alterar valores do registro! " . $mensagem->getLine() . ' # ' . $mensagem->getFile() . ' # ' . $mensagem->getMessage());
		}		
	}
}
