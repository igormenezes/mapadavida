<?php

class Listar {
	
	public function quantidadeDados(){
		
		global $url;
		
		if($url[0] == 'configuracao') {
			
			$conectar = Banco::instanciar();
			$registros = $conectar->listarTudo('usuarios');
			
			return $registros;
		}
		
		elseif($url[0] == 'registro') {
			
			$conectar = Banco::instanciar();
			$registros = $conectar->listarTudo('registros');

			$sessao = $conectar->ListarTudo('usuarios');
			
			for($i = 0; $i < count($registros); $i++) {

				if($_SESSION['login'] == $sessao[$i]['login'] && $_SESSION['senha'] == base64_decode($sessao[$i]['senha'])){

					$id_sessao = $sessao[$i]['id'];
				}	
			}
			
			if($id_sessao == 1) {
				
				return $registros;
			}
			
			elseif(isset($id_sessao)) {
				
				$contador_registros = $conectar->listarIdUsuario('registros',$id_sessao);

				return $contador_registros;		
			}
			
			else{
				
				return $registros;
			}
		}
		
		else{
	
			die("Não foi possivel listar a quantidade total de dados!");
		}
	}
	
	public function listarDados(){
		
		global $url;
		
		if(!isset($url[1]) || $url[1] == '') {

			$url[1] = 1;
		} 
		
		$pagina = $url[1];
		
		$registro_pagina = 5;
		
		$fim_contagem = $registro_pagina * $pagina;
		
		if($pagina == 1) {
			
			$incio_contagem = 0;
		}
		
		$inicio_contagem = $fim_contagem - $registro_pagina;
		
		$limit = Banco::instanciar();
		
		if($url[0] == 'configuracao') {
			
			$resultado = $limit->listarLimit('usuarios',$inicio_contagem,$fim_contagem);	
		
			$registros = $limit->listarTudo('usuarios');
			
			$qt_paginas = ceil(count($registros) / $registro_pagina);
		
			for($i = 0; $i < $registro_pagina; $i++) {
			
				if(!isset($resultado[$i])) {
				
					continue;
				}
			
				$senha =  base64_decode($resultado[$i]['senha']);
			
				echo "<p>Nome: <strong>{$resultado[$i]['nome_usuario']}</strong></p>
				  	  <p>E-mail: <strong>{$resultado[$i]['email_usuario']}</strong></p>
				      <p>Login: <strong>{$resultado[$i]['login']}</strong></p>
				      <p>Senha: <strong>$senha</strong></p>
				      <br />
				      <p><a href=\"/editar/{$resultado[$i]['id']}\">Alterar</a></p>
				      <p><a href=\"/deletar/{$resultado[$i]['id']}\">Deletar</a></p>
				      <br /><br />	 
				    "; 
			}
		 }
		
		 elseif ($url[0] == 'registro') {
			
			$resultado = $limit->listarLimit('registros',$inicio_contagem,$fim_contagem);
			 
			$qt_dados = count($resultado); 	
		
			$registros = $limit->listarTudo('registros');
			
			$sessao = $limit->listarTudo('usuarios');
			
			for($i = 0; $i < count($sessao); $i++) {

				if($_SESSION['login'] == $sessao[$i]['login'] && $_SESSION['senha'] == base64_decode($sessao[$i]['senha'])){

					$id_sessao = $sessao[$i]['id'];
				}	
			}
			
			if(!isset($id_sessao)) {
				
				die("Erro não foi possivel verificar o id da sessao atual para gerar os dados!");
			}
			
			$qt_paginas = ceil(count($registros) / $registro_pagina);
		
			for($i = 0; $i < $registro_pagina; $i++) {
			
				if(!isset($resultado[$i])) {
				
					continue;
				}
				if($id_sessao == 1) {
					
					echo "<p>Nome do Participante: <strong>{$resultado[$i]['nome_participante']}</strong></p>
						  <p>Nome do Psicologo: <strong>{$resultado[$i]['nome_psicologo']}</strong></p>
					  	  <p>E-mail: <strong>{$resultado[$i]['email']}</strong></p>
					      <p>Telefone: <strong>{$resultado[$i]['telefone']}</strong></p>
					      <p>Celular: <strong>{$resultado[$i]['celular']}</strong></p>
					      <div id=\"dados_completos\" class=\"dados_completos$i\">
					      	<p>Estado Civil: <strong>{$resultado[$i]['estado_civil']}</strong></p>
					      	<p>Profissão da Esposa: <strong>{$resultado[$i]['profissao_esposa']}</strong></p>
					      	<p>Idade: <strong>{$resultado[$i]['idade']}</strong></p>
					      	<p>Profissão: <strong>{$resultado[$i]['profissao']}</strong></p>
					      	<p>Numero de filhos: <strong>{$resultado[$i]['numero_filhos']}</strong></p>
					      	<p>Numero de irmãos: <strong>{$resultado[$i]['numero_irmaos']}</strong></p>
					      	<p>Observação: <strong>{$resultado[$i]['observacao']}</strong></p>
					      	<p>Média do Eu/Outro: <strong>{$resultado[$i]['outro_media']}</strong></p>
					      	<p>Média do Família/Social: <strong>{$resultado[$i]['social_media']}</strong></p>
					      	<p>Média do Afeto/Vínculo: <strong>{$resultado[$i]['vinculo_media']}</strong></p>
					      	<p>Média do Atividade Profissional/Econômico: <strong>{$resultado[$i]['atividade_media']}</strong></p>
					      	<p>Média do Identidade/Memória Social: <strong>{$resultado[$i]['memoria_media']}</strong></p>
					      	<p>Média Geral: <strong>{$resultado[$i]['media_geral']}</strong></p>
					      </div>	
					      <p>Relatorio: <strong><a href=\"/{$resultado[$i]['relatorio']}\" target=\"_blank\">Clique para fazer download do relatorio</a></strong></p>
					      <p>Data do Cadastro: <strong>{$resultado[$i]['data']}</strong></p>
					      <br />
					      <div id=\"dados\"><p><a href=\"javascript:visualizar($i,$qt_dados);\">Visualizar dados completos</a></p></div>
					      <div id=\"fechar\" class=\"fechar$i\"><a href=\"javascript:fechar($i,$qt_dados);\">Fechar dados completos</a></div>
					      <p><a href=\"/editar/{$resultado[$i]['id']}\">Alterar</a></p>
					      <p><a href=\"/deletar/{$resultado[$i]['id']}\">Deletar</a></p>
					      <br /><br />	 
					    "; 					
				}

				elseif($resultado[$i]['id_usuario'] == $id_sessao) {
					
					echo "<p>Nome do Participante: <strong>{$resultado[$i]['nome_participante']}</strong></p>
						  <p>Nome do Psicologo: <strong>{$resultado[$i]['nome_psicologo']}</strong></p>
					  	  <p>E-mail: <strong>{$resultado[$i]['email']}</strong></p>
					      <p>Telefone: <strong>{$resultado[$i]['telefone']}</strong></p>
					      <p>Celular: <strong>{$resultado[$i]['celular']}</strong></p>
					      <div id=\"dados_completos\" class=\"dados_completos$i\">
					      	<p>Estado Civil: <strong>{$resultado[$i]['estado_civil']}</strong></p>
					      	<p>Profissão da Esposa: <strong>{$resultado[$i]['profissao_esposa']}</strong></p>
					      	<p>Idade: <strong>{$resultado[$i]['idade']}</strong></p>
					      	<p>Profissão: <strong>{$resultado[$i]['profissao']}</strong></p>
					      	<p>Numero de filhos: <strong>{$resultado[$i]['numero_filhos']}</strong></p>
					      	<p>Numero de irmãos: <strong>{$resultado[$i]['numero_irmaos']}</strong></p>
					      	<p>Observação: <strong>{$resultado[$i]['observacao']}</strong></p>
					      	<p>Média do Eu/Outro: <strong>{$resultado[$i]['outro_media']}</strong></p>
					      	<p>Média do Família/Social: <strong>{$resultado[$i]['social_media']}</strong></p>
					      	<p>Média do Afeto/Vínculo: <strong>{$resultado[$i]['vinculo_media']}</strong></p>
					      	<p>Média do Atividade Profissional/Econômico: <strong>{$resultado[$i]['atividade_media']}</strong></p>
					      	<p>Média do Identidade/Memória Social: <strong>{$resultado[$i]['memoria_media']}</strong></p>
					      	<p>Média Geral: <strong>{$resultado[$i]['media_geral']}</strong></p>
					      </div>	
					      <p>Relatorio: <strong><a href=\"/{$resultado[$i]['relatorio']}\" target=\"_blank\">Clique para fazer download do relatorio</a></strong></p>
					      <p>Data do Cadastro: <strong>{$resultado[$i]['data']}</strong></p>
					      <br />
					      <div id=\"dados\"><p><a href=\"javascript:visualizar($i,$qt_dados);\">Visualizar dados completos</a></p></div>
					      <div id=\"fechar\" class=\"fechar$i\"><a href=\"javascript:fechar($i,$qt_dados);\">Fechar dados completos</a></div>
					      <p><a href=\"/editar/{$resultado[$i]['id']}\">Alterar</a></p>
					      <p><a href=\"/deletar/{$resultado[$i]['id']}\">Deletar</a></p>
					      <br /><br />	 
					    "; 					
				}
			}			
		 }
		
		else{
			
			die ("Erro para gerar os valores de registros ou usuarios!");
		}
	
		$this->paginacaoDados($pagina,$qt_paginas);	
	}

	private function paginacaoDados($pagina,$qt_paginas) {
		
		global $url;
		
		$anterior = $pagina - 1;
		
		$proxima = $pagina + 1;
		
		if($qt_paginas == 1 || $qt_paginas == 0){
			
			return false;
		}
		
		if($url[0] == 'configuracao') {
		
			for($i = 1; $i <= $qt_paginas; $i++) {
				
				$link_atual = '';
				
				if($i == $pagina){
					
					$link_atual = 'atual';
				}
				
				if($i == 1 && $pagina == 1) {
					
					$numeros[] = "<div id=\"paginacao\"><a href=\"/configuracao/$i\"><span id=\"$link_atual\">" . $i . "</span></a> ";
				}
				
				elseif($i > 5){
					
					if($qt_paginas != $pagina){
						
						$link_atual = '';
					}
					
					else{
						$link_atual = 'atual';
					}
					
					$numeros[] = "<a href=\"/configuracao/$qt_paginas\"><span id=\"$link_atual\">" . "..." . "</span></a> ";
					break;
				}
				
				elseif($i == $qt_paginas && $pagina != 1 && $pagina == $qt_paginas) {
					
					$numeros[] = "<a href=\"/configuracao/$i\"><span id=\"$link_atual\">" . $i . "</span></a></div> ";
				}
				
				else{
					$numeros[] = "<a href=\"/configuracao/$i\"><span id=\"$link_atual\">" . $i . "</span></a> ";
				}	
			}
			
			if($pagina > 1) {
				
				echo "<div id=\"paginacao\"><a href=\"/configuracao/$anterior\"><<</a> ";
			}		
			
			foreach ($numeros as $valor) {
				print_r($valor);	
			}
			
			if($pagina < $qt_paginas) {
		
				echo "<a href=\"/configuracao/$proxima\">>></a></div> ";
			}
		}
		
		elseif($url[0] == 'registro') {
			
			for($i = 1; $i <= $qt_paginas; $i++) {
				
				$link_atual = '';
				
				if($i == $pagina){
					
					$link_atual = 'atual';
				}
				
				if($i == 1 && $pagina == 1) {
					
					$numeros[] = "<div id=\"paginacao\"><a href=\"/configuracao/$i\"><span id=\"$link_atual\">" . $i . "</span></a> ";
				}
				
				elseif($i > 5){
					
					if($qt_paginas != $pagina){
						
						$link_atual = '';
					}
					
					else{
						$link_atual = 'atual';
					}
					
					$numeros[] = "<a href=\"/configuracao/$qt_paginas\"><span id=\"$link_atual\">" . "..." . "</span></a> ";
					break;
				}
				
				elseif($i == $qt_paginas && $pagina != 1 && $pagina == $qt_paginas) {
					
					$numeros[] = "<a href=\"/configuracao/$i\"><span id=\"$link_atual\">" . $i . "</span></a></div> ";
				}
				
				else{
					$numeros[] = "<a href=\"/configuracao/$i\"><span id=\"$link_atual\">" . $i . "</span></a> ";
				}	
			}
			
			if($pagina > 1) {
				
				echo "<div id=\"paginacao\"><a href=\"/configuracao/$anterior\"><<</a> ";
			}		
			
			foreach ($numeros as $valor) {
				print_r($valor);	
			}
			
			if($pagina < $qt_paginas) {
		
				echo "<a href=\"/configuracao/$proxima\">>></a></div> ";
			}			
		}
		
		else{
			
			die("Erro para gerar a paginacao!");
		}
	}
}