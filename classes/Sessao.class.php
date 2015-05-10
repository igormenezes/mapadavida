<?php

class Sessao {
	
	//faz login no sistema

	public function iniciarSessao($login,$senha) {
		
		try{
			
			//pega a url atual com a global
			
			global $url;
			
			//lista todos os usuarios existentes
			
			$listar = Banco::instanciar();
			$imprimir = $listar->listarTudo("usuarios");
			
			//contador, numero de registros na tabela usuarios
			
			$numero_registros = count($imprimir);
			
			//percorre até i for menor que o numero de registros, para ver se o login e senha estão corretos
					
			for($i = 0; $i < $numero_registros; $i++) {
				
				//verifica se o login e a senha possui o valores corretos
				
				if ($login == $imprimir[$i]['login'] && $senha == base64_decode($imprimir[$i]['senha'])) {
					
					//inicia sessao
			
					session_start();
					
					//pega os valores de login e senha
	
					$_SESSION['login'] = $login;
					$_SESSION['senha'] = $senha;
					
					//verifica se a url atual é da pagina do usuario mestre
					
					if($url[1] == 1){
						
						//redireciona para a proxima página e da um alert com as alteracoes feitas do usuario mestre
						
						header("location:/configuracao");
						
					}
					
					else{
						
						header("location:/painel");
					}
				}
				
				//se possuir os valores incorretos apresenta uma mensagem na tela
				
				if($i == $numero_registros - 1){
	
					echo "<script type=\"text/javascript\">alert(\"Login e senha incorretos!\");</script>";
				}
			}
		}
	
		catch(Exception $mensagem) {
			
			die ("Não foi possivel iniciar Sessao! " . $mensagem->getLine() . ' # ' . $mensagem->getFile() . ' # ' . $mensagem->getMessage());
		}
	}

	//faz logout do sistema

	public function apagarSessao() {
		
		try{
			
			//inicia sessao
	
			session_start();
	
			//zera a sessao que agora nao possui nenhum valor
			
			$_SESSION = array();
	
			//destroi a sessao 
	
			session_destroy();
	
			//move para a pagina index do admin
		
			echo "<script type=\"text/javascript\">alert(\"Voce saiu com sucesso do sistema!\"); location.href='/inicio'</script>";	
		}
		
		catch(Exception $mensagem) {
			
			die ("Não foi possivel apagar Sessao! " . $mensagem->getLine() . ' # ' . $mensagem->getFile() . ' # ' . $mensagem->getMessage());
		}	

	}
	
	//verifica login e senha

	public function verificarSessao() {
		
		try{

			//inicia sessao
	
			session_start();
			
			// verifica se existe Sessao
			
			if(isset($_SESSION['login']) && isset($_SESSION['senha'])) {

				//pega os valores atuais de login e senha
	
				$_SESSION['login'];
				$_SESSION['senha'];
				
				//lista todos os usuarios existentes
				
				$listar = Banco::instanciar();
				$imprimir = $listar->listarTudo("usuarios");
				
				//contador, numero de registros na tabela usuarios
				
				$numero_registros = count($imprimir);
				
				//percorre até i for menor que o numero de registros, para ver se o login e senha estão corretos
				
				for($i = 0; $i < $numero_registros; $i++) {
		
					//verifica se o login e senha sao diferentes dos valores corretos e move para a pagina index do admin	
		
					if ($_SESSION['login'] == $imprimir[$i]['login'] && $_SESSION['senha'] == base64_decode($imprimir[$i]['senha'])) {
						
						return false;
					}
					
					//se possuir os valores incorretos apresenta uma mensagem na tela
					
					if($i == $numero_registros - 1){
		
						echo "<script type=\"text/javascript\">alert(\"Por favor entrar com login e senha!\"); location.href='/inicio'</script>";
					}
				}
			}
	
			// se nao existir sessao
			
			else{
				echo "<script type=\"text/javascript\">alert(\"Por favor entrar com login e senha!\"); location.href='/inicio'</script>";
			}
		}
	
		catch(Exception $mensagem) {
			
			die ("Não foi possivel verificar Sessao! " . $mensagem->getLine() . ' # ' . $mensagem->getFile() . ' # ' . $mensagem->getMessage());
		}	
	}

	//verifica se é usuario administrador master

	public function verificarUsuarioMaster() {
		
		try{

			//inicia sessao
	
			session_start();
			
			// verifica se existe Sessao
			
			if(isset($_SESSION['login']) && isset($_SESSION['senha'])) {
				
				//pega os valores atuais de login e senha
	
				$_SESSION['login'];
				$_SESSION['senha'];
				
				//lista todos os usuarios existentes
				
				$listar = Banco::instanciar();
				$imprimir = $listar->listarTudo("usuarios");
	
				//verifica se o login e senha sao diferentes dos valores corretos e move para a pagina index do admin	
		
				if ($_SESSION['login'] == $imprimir[0]['login'] && $_SESSION['senha'] == base64_decode($imprimir[0]['senha'])) {
						return false;
				}
					
				//se possuir os valores incorretos apresenta uma mensagem na tela
					
				else{
					
					echo "<script type=\"text/javascript\">alert(\"Você não possui privilegios para acessar a esta área!\"); location.href='/painel'</script>";
				}
			}
	
			// se nao existir sessao
			
			else{
				
				echo "<script type=\"text/javascript\">alert(\"Por favor entrar com login e senha!\"); location.href='/inicio'</script>";
			}
		}
	
		catch(Exception $mensagem) {
			
			die ("Não foi possivel verificar Usuario Master! " . $mensagem->getLine() . ' # ' . $mensagem->getFile() . ' # ' . $mensagem->getMessage());
		}
	}
} 