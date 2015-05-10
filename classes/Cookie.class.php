<?php

/*classe que toma conta da manipulacao de cookies do sistema*/

class Cookie {
	
	/*funcao armazenarCookies que cuida da criacao de cookies no sistema pegando diretamente do valor da propriedade da classe dados*/

	public function armazenarCookie($post) {
		
		try{
			
			foreach($post as $nome => $valor) {
		
				setcookie($nome,$valor,time()+7200);
			}
		}
		
		catch(Exception $mensagem){
			die("Erro na criação de Cookies! " . $mensagem->getLine() . ' # ' . $mensagem->getFile() . ' # ' . $mensagem->getMessage());
		}
	}
	
	/*funcao apagarCookies cuida de apagar todos os cookies existentes no sistema*/
	
	public function apagarCookie($cookie) {
		
		try{
			
			foreach($cookie as $nome => $valor) {
	
				setcookie($nome);
			}
			
		}
		
		catch(Exception $mensagem){
			die("Erro para apagar os Cookies! " . $mensagem->getLine() . ' # ' . $mensagem->getFile() . ' # ' . $mensagem->getMessage());
		}	
	}
}