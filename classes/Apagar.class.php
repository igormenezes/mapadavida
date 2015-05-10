<?php

class Apagar {
	
	public function apagarDados() {
		
		global $url;
		
		$url_anterior = explode("/",$_SERVER['HTTP_REFERER']);
		
		$conectar = Banco::instanciar();
		
		if($url_anterior[3] == 'configuracao') {
				
			if($url[1] == 1) {
			
				echo"<script type=\"text/javascript\">alert(\"Voce nao pode deletar o usuario mestre!\"); location.href=\"/configuracao\";</script>";
			} 
		
			else {
			
				$conectar->deletar('usuarios',$url[1]);
			
				echo"<script type=\"text/javascript\">alert(\"Usuario deletado com sucesso!\"); location.href=\"/configuracao\";</script>";
			}		
		}
		
		elseif($url_anterior[3] == 'registro') {
			
			$resultado = $conectar->listarId('registros',$url[1]);
			
			if(file_exists($resultado['relatorio'])) {
				
				unlink($resultado['relatorio']);	
			}
			
			$conectar->deletar('registros',$url[1]);
			
			echo"<script type=\"text/javascript\">alert(\"Registro deletado com sucesso!\"); location.href=\"/registro\";</script>";	
		}
		
		else{
			
			die("Erro para apagar os dados!");
		}
	}
}
