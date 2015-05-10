<?php

class Pesquisar {
	
	public function pesquisarDados() {
		
		global $url;
		
		$listar = Banco::instanciar();
		
		if($url[0] == 'configuracao') {
			
			$relatorio = $listar->listarTudo("usuarios");	
		}
		
		elseif($url[0] == 'registro') {
			
			$relatorio = $listar->listarTudo("registros");
		}
		
		$palavra = "/{$_POST['busca']}/i";
		
		$existe = false;
		
		for($i = 0; $i < count($relatorio); $i++) {
			
		    if(empty($_POST['busca'])){

				$mensagem = "<strong>Você não preencheu o campo procurar, por isso sua busca não foi realizada!</strong>";
				return $mensagem;
			}
			
			if($url[0] == 'configuracao') {
			
				if( preg_match($palavra,$relatorio[$i]['nome_usuario']) ) {
	
					$senha =  base64_decode($relatorio[$i]['senha']);
						
					$mensagem[] =  "<p>Nome: <strong>{$relatorio[$i]['nome_usuario']}</strong></p>
						  	  		<p>E-mail: <strong>{$relatorio[$i]['email_usuario']}</strong></p>
						     	 	<p>Login: <strong>{$relatorio[$i]['login']}</strong></p>
						      		<p>Senha: <strong>$senha</strong></p>
						      		<br />
						     		<p><a href=\"/editar/{$relatorio[$i]['id']}\">Alterar</a></p>
						     		<p><a href=\"/deletar/{$relatorio[$i]['id']}\">Deletar</a></p>
						      		<br /><br />";
					$existe = true;		  			  
				}				
			}

			elseif($url[0] == 'registro') {
				
				$qt_dados = count($relatorio);
				
				if( preg_match($palavra,$relatorio[$i]['nome_participante']) ) {
						
					$mensagem[] =  "<p>Nome do Participante: <strong>{$relatorio[$i]['nome_participante']}</strong></p>
						 		 	<p>Nome do Psicologo: <strong>{$relatorio[$i]['nome_psicologo']}</strong></p>
					  	  			<p>E-mail: <strong>{$relatorio[$i]['email']}</strong></p>
								    <p>Telefone: <strong>{$relatorio[$i]['telefone']}</strong></p>
								    <p>Celular: <strong>{$resultado[$i]['celular']}</strong></p>
								    <div id=\"dados_completos\" class=\"dados_completos$i\">
								    	<p>Estado Civil: <strong>{$relatorio[$i]['estado_civil']}</strong></p>
								      	<p>Profissão da Esposa: <strong>{$relatorio[$i]['profissao_esposa']}</strong></p>
								      	<p>Idade: <strong>{$relatorio[$i]['idade']}</strong></p>
								      	<p>Profissão: <strong>{$relatorio[$i]['profissao']}</strong></p>
								      	<p>Numero de filhos: <strong>{$relatorio[$i]['numero_filhos']}</strong></p>
								      	<p>Numero de irmãos: <strong>{$relatorio[$i]['numero_irmaos']}</strong></p>
								      	<p>Observação: <strong>{$relatorio[$i]['observacao']}</strong></p>
								      	<p>Média do Eu/Outro: <strong>{$relatorio[$i]['outro_media']}</strong></p>
								      	<p>Média do Família/Social: <strong>{$relatorio[$i]['social_media']}</strong></p>
								      	<p>Média do Afeto/Vínculo: <strong>{$relatorio[$i]['vinculo_media']}</strong></p>
								      	<p>Média do Atividade Profissional/Econômico: <strong>{$relatorio[$i]['atividade_media']}</strong></p>
								      	<p>Média do Identidade/Memória Social: <strong>{$relatorio[$i]['memoria_media']}</strong></p>
								      	<p>Média Geral: <strong>{$relatorio[$i]['media_geral']}</strong></p>
								      </div>	
								      <p>Relatorio: <strong><a href=\"/{$relatorio[$i]['relatorio']}\" target=\"_blank\">Clique para fazer download do relatorio</a></strong></p>
								      <p>Data do Cadastro: <strong>{$relatorio[$i]['data']}</strong></p>
								      <br />
								      <div id=\"dados\"><p><a href=\"javascript:visualizar($i,$qt_dados);\">Visualizar dados completos</a></p></div>
								      <div id=\"fechar\" class=\"fechar$i\"><a href=\"javascript:fechar($i,$qt_dados);\">Fechar dados completos</a></div>
								      <p><a href=\"/editar/{$relatorio[$i]['id']}\">Alterar</a></p>
								      <p><a href=\"/deletar/{$relatorio[$i]['id']}\">Deletar</a></p>
								      <br /><br />
								     ";
					$existe = true;		  			  
				}				
			}
		}

		if($existe == true) {
			
			return $mensagem;	
			
			header("location:/configuracao");
		}
		
		else {
			
			$palavra = explode("/",$palavra);
		
			$mensagem = "Não existe nenhuma informação com o nome " . "<strong>" . $palavra[1] . "</strong>";
		
			return $mensagem;
		}	
	}
}
