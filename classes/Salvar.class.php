<?php

class Salvar {
		
	public function salvarDados($media,$relatorio,$qt_categorias){

		$this->qt_pessoas = $_COOKIE['qt_participante'] + $_COOKIE['qt_psicologo'];
		
		$qt_medias = $qt_categorias * $_COOKIE['qt_participante'];
		
		$controle = 0;
		
		$conectar = Banco::instanciar();
		$resultado = $conectar->listarTudo("usuarios");
		
		for($i = 0; $i < count($resultado); $i++){
		
			if($_SESSION['login'] == $resultado[$i]['login'] && $_SESSION['senha'] == base64_decode($resultado[$i]['senha'])) {
				
				$id_usuario = $resultado[$i]['id'];	
			}
		}
		
		try{
		
			for($i = 1; $i <= $_COOKIE['qt_participante']; $i++) {
				
				$id_relatorio = $i - 1;
				
				$dados[] = $_COOKIE['participante' . $i];
				$dados[] = $_COOKIE['civil' . $i];
				
				if(isset($_COOKIE['profissao_esposa' . $i])) {
					
					$dados[] = $_COOKIE['profissao_esposa' . $i];	
				}
				
				else {
					
					$dados[] = '';
				}
				
				$dados[] = $_COOKIE['idade' . $i];
				$dados[] = $_COOKIE['profissao' . $i];
				$dados[] = $_COOKIE['telefone' . $i];
				
				if(isset($_COOKIE['celular' . $i])){
					
					$dados[] = $_COOKIE['celular' . $i];	
				}
				
				else {
					
					$dados[] = '';
				}
				
				$dados[] = $_COOKIE['email' . $i];
				
				if(isset($_COOKIE['filho' . $i])) {
					
					$dados[] = $_COOKIE['filho' . $i];	
				}
				
				else {
					
					$dados[] = '';
				}
				
				if(isset($_COOKIE['irmao' . $i])) {
					
					$dados[] = $_COOKIE['irmao' . $i];	
				}
				
				else {
					
					$dados[] = '';
				}
				
				if(isset($_COOKIE['observacao' . $i])){
					
					$dados[] = $_COOKIE['observacao' . $i];	
				}
				
				else {
					
					$dados[] = '';
				}
				
				for($y = 1; $y <= $_COOKIE['qt_psicologo']; $y++){
					
					if($y == 1) {
						$psicologos = $_COOKIE['psicologo' . $y];	
					}
					
					else{
						$psicologos .= ", " . $_COOKIE['psicologo' . $y];
					}
				}
	
				$dados[] = $psicologos;
				
				if($controle == $qt_medias) {
					
					$controle = 0;
				}
				
				for($x = 0; $x < $qt_categorias; $x++) {
					
					$medias[$x] = $media[$controle];
					
					unset($media[$controle]);
					
					$controle++;
				}
				
		    	$oque = array(
					'nome_participante' => $dados[count($dados) - count($dados)],
					'estado_civil' => $dados[count($dados) - (count($dados) - 1)],
					'profissao_esposa' => $dados[count($dados) - (count($dados) - 2)],
					'idade' => $dados[count($dados) - (count($dados) - 3)],
					'profissao' => $dados[count($dados) - (count($dados) - 4)],
					'telefone' => $dados[count($dados) - (count($dados) - 5)],
					'celular' => $dados[count($dados) - (count($dados) - 6)],
					'email' => $dados[count($dados) - (count($dados) - 7)],
					'numero_filhos' => $dados[count($dados) - (count($dados) - 8)],
					'numero_irmaos' => $dados[count($dados) - (count($dados) - 9)],
					'observacao' => $dados[count($dados) - (count($dados) - 10)],
					'outro_media' => $medias[0],
					'social_media' => $medias[1],
					'vinculo_media' => $medias[2],
					'corpo_media' => $medias[3],
					'atividade_media' => $medias[4],
					'memoria_media' => $medias[5],
					'media_geral' => $medias[6],
					'nome_psicologo' => $dados[count($dados) - (count($dados) - 11)],
					'relatorio' => $relatorio[$id_relatorio],
					'data' => date("d.m.y"),
					'id_usuario' => $id_usuario
				);
				
				unset($dados);
				
				$inserir = Banco::instanciar();
				$inserir->inserir($oque,"registros");
			}

			$_COOKIE = array();
		
			echo "<script type=\"text/javascript\">alert(\"Cadastro realizado com sucesso!\"); location.href='/painel'</script>" ;
		}

		catch(Exception $mensagem) {
			
			die ("Não foi possivel cadastrar as informações no banco de dados! " . $mensagem->getLine() . ' # ' . $mensagem->getFile() . ' # ' . $mensagem->getMessage());
		}
	}
}