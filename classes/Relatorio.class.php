<?php

/*classe PDF*/

class Relatorio{
	
	/*criação de propriedades da classe*/
	
	/*propriedade que soma a quantidade de pessoas*/
	
	private $qt_pessoas;
	
	/*propriedade que é um array, que possue todas as categorias existentes*/
	
	private $categorias = array('outro','social','vinculo','corpo','atividade','memoria','media');
	
	/*propriedade que possue string para verificar qual o input atual para verificacao*/
	
	private $string = array('_media','_geral');
	
	/*funcao gerarMedias calcula a media de cada categoria e a media final*/
	
	public function gerarMedias(){
		
		/*variavel para controle verifica o id atual dos POST*/
		
		$controle = 0;
		
		/*funcao para percorrer todas as quantidades de participantes existentes*/
		
		for($i = 1; $i <= $_COOKIE['qt_participante']; $i++) {
			
			/*variavel y para verificao no while*/
			
			$y = 0;
			
			/*acrescenta mais um na variavel controle*/
			
			$controle++;
			
			/*while para percorrer a quantidade existentes de categorias*/
			
			while($y < count($this->categorias)) {
				
				/*variavel string igual a _media*/
				
				$string = $this->string[0];
				
				/*se a variavel y for igual a 6 a variavel string e igual a _geral*/
				
				switch ($y) {
					case 6:
						$string = $this->string[1];
						break;
					default:
						break;
				}
				
			/*verifica os valores do POST, para dar a media igual a categoria especifica*/	
				
			if($_POST[$this->categorias[$y] . $string . $controle] >= 1.00 && $_POST[$this->categorias[$y] . $string . $controle] <= 1.75) {
				
				/*variavel arquivo e igual ao endereco do arquivo de acordo com os dados de categoria e media*/
					
				$arquivo = "arquivos/medias/" . $this->categorias[$y] . "_embrionaria" . ".txt";
				
				/*array recebe a media para a categoria*/
				
				$media[] = 'Embrionaria';
				
				/*verifica se existe o endereco para o arquivo*/
				
				if(file_exists($arquivo)) {
					
					/*abre o arquivo, pega todas informacoes que existem dentro, e armazena na variavel conteudo*/
					
					$conteudo = file_get_contents($arquivo);
					
					/*armazena a variavel conteudo em um array dados*/
					
					$dados[] = $conteudo;
				}
				
				/*se o endereco do arquivo nao existir, avisa o usuario com uma mensagem*/
				
				else {
					echo"<script type=\"text/javascript\">alert(\"Ocorreu um erro na geração do relatorio do $arquivo \");</script>";
				}
			}
			
			/*verifica os valores do POST, para dar a media igual a categoria especifica*/
								
			elseif($_POST[$this->categorias[$y] . $string . $controle] >= 1.76 && $_POST[$this->categorias[$y] . $string . $controle] <= 2.50) {
				
				/*variavel arquivo e igual ao endereco do arquivo de acordo com os dados de categoria e media*/
					
				$arquivo = "arquivos/medias/" . $this->categorias[$y] . "_dogmatica" . ".txt";
				
				/*array recebe a media para a categoria*/
				
				$media[] = 'Dogmatica';
				
				/*verifica se existe o endereco para o arquivo*/
				
				if(file_exists($arquivo)) {
					
					/*abre o arquivo, pega todas informacoes que existem dentro, e armazena na variavel conteudo*/
					
					$conteudo = file_get_contents($arquivo);
					
					/*armazena a variavel conteudo em um array dados*/
					
					$dados[] = $conteudo;
				}
				
				/*se o endereco do arquivo nao existir, avisa o usuario com uma mensagem*/
					
				else {
					echo"<script type=\"text/javascript\">alert(\"Ocorreu um erro na geração do relatorio do $arquivo \");</script>";
				}		
			}
			
			/*verifica os valores do POST, para dar a media igual a categoria especifica*/
						
			elseif($_POST[$this->categorias[$y] . $string . $controle]  >= 2.51 && $_POST[$this->categorias[$y] . $string . $controle] <= 3.25) {
					
				/*variavel arquivo e igual ao endereco do arquivo de acordo com os dados de categoria e media*/
						
				$arquivo = "arquivos/medias/" . $this->categorias[$y] . "_critica" . ".txt";
				
				/*array recebe a media para a categoria*/
				
				$media[] = 'Critica';
				
				/*verifica se existe o endereco para o arquivo*/
				
				if(file_exists($arquivo)) {
					
					/*abre o arquivo, pega todas informacoes que existem dentro, e armazena na variavel conteudo*/
					
					$conteudo = file_get_contents($arquivo);
					
					/*armazena a variavel conteudo em um array dados*/
					
					$dados[] = $conteudo;
				}
				
				/*se o endereco do arquivo nao existir, avisa o usuario com uma mensagem*/
					
				else {
					echo"<script type=\"text/javascript\">alert(\"Ocorreu um erro na geração do relatorio do $arquivo \");</script>";
				}						
			}
			
			/*verifica os valores do POST, para dar a media igual a categoria especifica*/
						
			elseif($_POST[$this->categorias[$y] . $string . $controle]  >= 3.26 && $_POST[$this->categorias[$y] . $string . $controle] <= 4.00) {
					
				/*variavel arquivo e igual ao endereco do arquivo de acordo com os dados de categoria e media*/
						
				$arquivo = "arquivos/medias/" . $this->categorias[$y] . "_reflexiva" . ".txt";
				
				/*array recebe a media para a categoria*/
				
				$media[] = 'Reflexiva';
				
				/*verifica se existe o endereco para o arquivo*/
				
				if(file_exists($arquivo)) {
					
					/*abre o arquivo, pega todas informacoes que existem dentro, e armazena na variavel conteudo*/
					
					$conteudo = file_get_contents($arquivo);
					
					/*armazena a variavel conteudo em um array dados*/
					
					$dados[] = $conteudo;
				}
				
				/*se o endereco do arquivo nao existir, avisa o usuario com uma mensagem*/
					
				else {
					echo"<script type=\"text/javascript\">alert(\"Ocorreu um erro na geração do relatorio do $arquivo \");</script>";
				}	
			}
			
			else{	
				echo "<script type=\"text/javascript\">alert(\"Erro para gerar os relatorios!\");</script>";
			}	
			
			/*acrescenta mais um na variavel y*/
			
			$y++;
		}
	}
	
	/*chama a funcao gerarPDF*/
	
	$this->gerarPDF($dados,count($this->categorias),$media);	
	
	}

	/*funcao gerarPDF recebe como parametros os dados de todo o conteudo de cada media,quantidade de categorias existentes,variavel contador com o numero de registros existentes no banco de dados, variavel media com as medias para cada categoria*/
	
	private function gerarPDF($dados,$qt_categorias,$media){	
		
		/*variavel controle igual a zero*/
		
		$controle = 0;
		
		/*variavel verifica igual a zero*/
		
		$verifica = 0;
		
		/*soma a quantidade de participantes e psicologos para dar a quantidade de pessoas*/
		
		$this->qt_pessoas = $_COOKIE['qt_participante'] + $_COOKIE['qt_psicologo'];
			
		/*instancia a classe static Banco e chama a funcao instanciar*/

		$conectar = Banco::instanciar();

		/*funcao contar quantidade de registros no banco de dados*/

		$contador = $conectar->contar('registros');	
		
		/*for para percorrer a quantidade de participantes*/
		
		for($i = 1; $i <= $_COOKIE['qt_participante']; $i++){
			
			try{
				
				/*puxa o arquivo da biblioteca DOMPDF para poder gerar o PDF*/
				
				require_once("arquivos/DOMPDF/dompdf_config.inc.php");
				
				/*variavel html que pega todas as informacoes que iram para gerar o relatorio detro do PDF*/
		
				$html = " 
						<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
						<html xmlns=\"http://www.w3.org/1999/xhtml\">
						<head>
						<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
						</head>
						<body>
						<style>
							*{padding:0px; margin:0px;}
							#titulo{ font-size:30px; font-weight: bold;}
							#subtitulo{ font-size:28px; font-weight: bold;}
							#categoria{ font-size:25px; font-weight: bold;}
							#relatorio{font-family:verdana; font-size:22px;}
							#logo{text-align:center; margin:100px 0 0 0;} 
							.quebra{ display:block; page-break-after:always;}
							h1{page-break-after:always;};
						</style>
						<div id=\"relatorio\">
							<div id=\"logo\">
								<img src=\"imagens/imagem.jpg\" />
							</div>
							<br /><br /><br />
							<p>Nome Participante:<strong>{$_COOKIE['participante' . $i]}</strong></p>
							<br />
							<p>Nome Psicologo:<strong>{$this->gerarQuantidadePsicologos()}</strong></p>
							<br class=\"quebra\" />
							{$this->gerarRelatorio($dados,$qt_categorias,$controle)}
							<br class=\"quebra\" />
							<p id=\"titulo\">Sentimentos Predominantes</p>
							<br />
							<p id=\"subtitulo\">Sentimentos Eg&oacute;icos</p>
							<br />
							<p id=\"categoria\">Ego Sint&ocirc;nicos</p>
							<br />
							<p>O Sentimento do Pr&oacute;prio Valor:<strong> {$this->gerarVotacao("valor")}</strong></p>
							<p>O Sentimento de Liberdade:<strong> {$this->gerarVotacao("liberdade")}</p>
							<p>Vaidade:<strong> {$this->gerarVotacao("vaidade")}</p>
							<p>O Contentamento e a Satisfa&ccedil;&atilde;o:<strong> {$this->gerarVotacao("satisfacao")}</strong></p>
							<br />
							<p id=\"categoria\">Ego Dist&ocirc;nicos</p>
							<br />
							<p>O Sentimento de Desvalor:<strong> {$this->gerarVotacao("desvalor")}</strong></p>
							<p>O Sentimento de Frusta&ccedil;&atilde;o:<strong> {$this->gerarVotacao("frustacao")}</strong></p>
							<p>O Arrependimento:<strong> {$this->gerarVotacao("arrependimento")}</strong></p>
							<p>O Sentimento de Abandono:<strong> {$this->gerarVotacao("abandono")}</strong></p>
							<p>A Vergonha:<strong> {$this->gerarVotacao("vergonha")}</strong></p>
							<br />
							<p id=\"subtitulo\">Sentimentos Dirigidos ao Pr&oacute;ximo</p>
							<br />
							<p id=\"categoria\">Simpatia</p>
							<br />
							<p>A Simpatia:<strong> {$this->gerarVotacao("simpatia")}</strong></p>
							<p>A Estima:<strong> {$this->gerarVotacao("estima")}</strong></p>
							<p>O Carinho:<strong> {$this->gerarVotacao("carinho")}</strong></p>
							<p>O Amor:<strong> {$this->gerarVotacao("amor")}</strong></p>
							<p>A Compaix&atilde;o:<strong> {$this->gerarVotacao("compaixao")}</strong></p>
							<br />
							<p id=\"categoria\">Valoriza&ccedil;&atilde;o</p>
							<br />
							<p>A Confian&ccedil;a:<strong> {$this->gerarVotacao("confianca")}</strong></p>
							<p>A Considera&ccedil;&atilde;o e o Respeito:<strong> {$this->gerarVotacao("respeito")}</strong></p>
							<p>A Admira&ccedil;&atilde;o:<strong> {$this->gerarVotacao("admiracao")}</strong></p>
							<p>A Gratid&atilde;o:<strong> {$this->gerarVotacao("gratidao")}</strong></p>
							<br />
							<p id=\"categoria\">Antipatia</p>
							<br />
							<p>A Antipatia:<strong> {$this->gerarVotacao("antipatia")}</strong></p>
							<p>A Avers&atilde;o:<strong> {$this->gerarVotacao("aversao")}</strong></p>
							<p>O &Oacute;dio:<strong> {$this->gerarVotacao("odio")}</p>
							<p>O Ressentimento:<strong> {$this->gerarVotacao("ressentimento")}</strong></p>
							<p>A M&aacute;goa:<strong> {$this->gerarVotacao("magoa")}</strong></p>
							<br />
							<p id=\"categoria\">Desvaloriza&ccedil;&atilde;o</p>
							<br />
							<p>A Desconfian&ccedil;a:<strong> {$this->gerarVotacao("desconfianca")}</strong></p>
							<p>O Despreso:<strong> {$this->gerarVotacao("despreso")}</strong></p>
							<p>A Inveja:<strong> {$this->gerarVotacao("inveja")}</strong></p>
							<p>O Ci&uacute;mes:<strong> {$this->gerarVotacao("ciumes")}</strong></p>
							<br />
							<p id=\"categoria\">Sentimentos de Temperamento</p>
							<br />
							<p>A Espera e a Esperan&ccedil;a:<strong> {$this->gerarVotacao("esperanca")}</strong></p>
							<p>A Desesperan&ccedil;a:<strong> {$this->gerarVotacao("desesperanca")}</strong></p>
							<p>A Preocupa&ccedil;&atilde;o com o Futuro: <strong>{$this->gerarVotacao("futuro")}</strong></p>
							<p>A Nostalgia e a Sa&uacute;dade:<strong> {$this->gerarVotacao("saudade")}</strong></p>
							<br class=\"quebra\" />
							<p id=\"titulo\">Legenda</p>
							<br />
							{$this->gerarLegenda()}
							<p>T -<strong> T&ecirc;nue</strong></p>
							<p>M -<strong> Moderado</strong></p>
							<p>E -<strong> Expressivo</strong></p>
							<p>F -<strong> Forte</strong></p>
						</div>
						</body>
						</html>
						";

					/* abre a biblioteca DOMPDF para dar inicio*/	
			
					$pdf = new DOMPDF();
					
					/*carrega o conteudo da variavel html para dentro do PDF*/
					
					$pdf->load_html($html);
					
					/*define o tamanho do PDF para uma folha A4*/
					
					$pdf->set_paper('595', '842');
					
					/*funcao para rodar o PDF*/
					
					$pdf->render();
					
					/*funcao para salvar dentro da variavel salvando as informacoes dentro do PDF*/
					
					$salvando = $pdf->output();
					
					/*percorre o array contador que possui o numero de registros no banco de dados*/
					
					foreach ($contador as $valor) {
								
							$numero_registros = $valor;
					}
					
					/*adiciona mais um para cada relatorio*/
					
					$numero_registros = $numero_registros + $i;
					
					/*separa o nome do participante por nome e sobrenome pelos espacos existentes*/
					
					$nome = explode(" ",$_COOKIE['participante' . $i]);
					
					/*se existe sobrenome*/
					
					if(isset($nome[1])) {
						
						/*variavel arquivo para dar o nome do pdf salvo, nome definido pelo numero do registro e pelo primeiro nome e segundo nome*/
						
						$arquivo[] = "arquivos/relatorios/$numero_registros-$nome[0] $nome[1].pdf";
					}
					
					/*se nao existir sobrenome*/
					
					else {
						
						/*variavel arquivo para dar o nome do pdf salvo, nome definido pelo numero do registro e pelo primeiro nome e segundo nome*/
						
						$arquivo[] = "arquivos/relatorios/$numero_registros-$nome[0].pdf";
					}	
					
					/*cria o arquivo de acordo com o endereco e nome e conteudo existente no PDF*/
					
					$atual = $i - 1;
					
					$salvar = file_put_contents($arquivo[$atual],$salvando);	
					
					/*se o arquivo estiver aberto, apresentar mensagem de erro*/
					
					if($salvar == false){
						
						die("Ocorreu um erro, na hora de gerar o relatorio, por favor verifica se o arquivo está aberto e feche, para não repetir este erro!");
					}
			}
			
			catch(Exception $mensagem) {
					
				die ("Não foi possivel gerar o relatorio! " . $mensagem->getLine() . ' # ' . $mensagem->getFile() . ' # ' . $mensagem->getMessage());
			}			
		}
		
		/*chamar funcao juntarDados passa por parametro as medias de todas as categorias e todos os relatorios gerados*/
		
		/*require na classe Salvar, pois tem um bug com DOMPDF e nessa classe nao funciona o autoload*/
		
		require_once("classes/Salvar.class.php");	
		
		/*instanciar a classe Salvar*/
		
		$salvar_dados = new Salvar();
		
		/*chama a funcao salvarDados e passa por parametro os valores das medias de todas as categorias, os relatorios gerados e a quantidade de categorias*/
		
		$salvar_dados->salvarDados($media,$arquivo,$qt_categorias);		
	}
	
	/*funcao gerarRelatorio recebe por parametros os dados com cada conteudo para o PDF, quantidade de categorias e variavel controle */
	
	private function gerarRelatorio($dados,$qt_categorias,$controle) {
			
		/*verifica se variavel controle é igual a quantidade de categorias*/	
		
		if($controle == $qt_categorias) {
			
			/*variavel controle tem o valor zero*/
			
			$controle = 0;
		}	
		
		/* usa o for para percorrer até i ser menor que a quantidade de categorias*/
		
		for($i = 0; $i < $qt_categorias; $i++){
				
				/*array relatorios[quantas vezes ja percorreu o for] é igual ao array dados[valor da variavel controle]*/		
				
				$relatorios[$i] = $dados[$controle];
				
				/*deleta o valor do array dados[valor da variavel controle]*/
				
				unset($dados[$controle]);
				
				/*variavel controle acrescenta mais um*/
				
				$controle++;		
		}
		
		/*variavel imprimir para transforma o array relatorios em uma string separando por quebra de linha*/
		
		$imprimir = implode("<br /><br />",$relatorios);
		
		/*retorna a variavel imprimir*/
		
		return $imprimir; 
	}
	
	/*funcao gerarVotacao, recebe por parametro o nome do campo da categoria sentimentos*/
	
	private function gerarVotacao($valor) {
		
		/*usa o for para percorrer até variavel i ser menor ou igual a quantidade de pessoas*/
		
		for($i = 1; $i <= $this->qt_pessoas; $i++){
			
			/*array sentimentos[quantas vezes ja percorreu o for] é igual a quantas vezes ja percorreu o for + - + o valor do POST valor[quantas vezes ja percorreu o for]*/
			
			$sentimentos[$i] = $i . ' - ' . $_POST[$valor . $i];
		}
		
		/*variavel imprimir para transforma o array sentimentos em uma string separando por |*/
		
		$imprimir = implode(" | ",$sentimentos);
		
		/*reotrna a variavel imprimir*/
		
		return $imprimir;
	}
	
	/*funcao gerarQuantidadePsicologos*/
	
	private function gerarQuantidadePsicologos(){
		
		/*for para percorrer até o i ser menor ou igual a quantidade de psicologos*/
			
		for($i = 1; $i <= $_COOKIE['qt_psicologo']; $i++){
			
			/*se a variavel i for igual a 1*/
						
			if($i == 1) {
				
				/*variavel psicologos é igual ao COOKIE psicologo[quantas vezes ja percorreu o for]*/
				
				$psicologos = $_COOKIE['psicologo' . $i]; 
			}
			
			/*se nao concatena mais um valor de COOKIE psicologo[quantas vezes ja percorreu o for] na variavel psicologo*/
							
			else {
				$psicologos .= ", " . $_COOKIE['psicologo' . $i]; 
			}
		}
		
		/*retorna a variavel psicologo separando cada por quebra de linha*/
		
		return $psicologos . "<br /><br />";
	}
	
	/*funcao gerarLegenda*/
	
	private function gerarLegenda(){
		
		/*variavel participantes e psicologos igual a vazio*/
		
		$participantes = '';
		$psicologos = '';	
		
		/*for que percorre até variavel i se menor ou igual a quantidade de participantes*/
		
		for($i = 1; $i <= $_COOKIE['qt_participante']; $i++){
			
			/*variavel participantes é igual a o valor de i - valor do Cookie participante e vai concatenando até acabar o nuemro de participantes*/
			
			$participantes .= "<p>$i - <strong> {$_COOKIE['participante' . $i]}</strong></p>";
		}
		
		/*variavel x é igual a quantidade de participante mais um*/
		
		$x = $_COOKIE['qt_participante'] + 1;
		
		/*for que percorre i até ser menor ou igual a quantidade de psicologo*/
		
		for($i = 1; $i <= $_COOKIE['qt_psicologo']; $i++){
			
			/*variavel psicologo é igual a o valor de i - valor do Cookie psicologo e vai concatenando até acabar o numero de psicologos*/
			
			$psicologos .= "<p>$x - <strong> {$_COOKIE['psicologo' . $i]}</strong></p>";
			
			/*vairiavel x acrescenta mais um*/
			
			$x++;
		}
		
		/*retorna os participantes e os psicologos*/	
			
		return $participantes . $psicologos;
	}
}