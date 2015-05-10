<?php

/*classe Dados aonde ira receber os valores do formulario, e ira apresentar formulario da dinamica de acordo com os dados dos participantes e psicologos*/

class Dados {
	
	/*definindo propriedades da classe*/
	
	/*propriedade de controle para poder pegar os valores dentro do array, para cada categoria*/
	
	private $controle = 0;
	
	/*propriedades id_input para verificao e atribuicao de identidade para os inputs(campos de preenchimento) e id_legenda para identificacao das legendas*/
	
	private $id_input = 1;
	private $id_legenda = 1;
	
	/*propriedades para quantidade de pessoas, dinamica e sentimentos*/
	
	private $qt_pessoas;
	private $qt_dinamica;
	private $qt_sentimentos;
	
	/* funcao dinamicaLabel, gera o formulario com as label e dados do formulario do participante e psicologo*/
	
	public function gerarLabel() {
		
		/*soma todos os participantes e psicologos(menos o participante que vai ser votado) e armazena o valor na propriedade*/
		
		$this->qt_dinamica = $_COOKIE['qt_participante']+ $_COOKIE['qt_psicologo'] - 1;
		
		/*usa o for para imprimir o formulario de acordo com o numero de participantes*/
		
		for($i = 1; $i <= $_COOKIE['qt_participante']; $i++) {
			
			/*imprimi formulario da dinamica, e sua class é definidade pela quantidade variavel i e id_nome para pegar os nomes dos participantes*/
			
			echo 	"<h2>{$_COOKIE['participante'. $i]}</h2>
					 <label>Outro Eu</label>";
					 $this->gerarInput();
			echo 	"<input type=\"text\" class=\"outro_media$i\" id=\"outro_media\" name=\"outro_media$i\" readonly=\"readonly\" />
					 <label>Social Família</label>";
					 $this->gerarInput();	
			echo 	"<input type=\"text\" class=\"social_media$i\" id=\"social_media\" name=\"social_media$i\" readonly=\"readonly\" />
					 <label>Vinculo Afeto</label>";
					 $this->gerarInput();
			echo  	"<input type=\"text\" class=\"vinculo_media$i\" id=\"vinculo_media\" name=\"vinculo_media$i\" readonly=\"readonly\" />
					 <label>Corpo Cultura</label>";
					 $this->gerarInput();
			echo 	"<input type=\"text\" class=\"corpo_media$i\" id=\"corpo_media\" name=\"corpo_media$i\" readonly=\"readonly\" />
					 <label>Atividade Profissional Economico</label>";
					 $this->gerarInput();
			echo 	"<input type=\"text\" class=\"atividade_media$i\" id=\"atividade_media\" name=\"atividade_media$i\" readonly=\"readonly\" />
					 <label>Memoria Social Indentidade</label>";
					 $this->gerarInput();
			echo 	"<input type=\"text\" class=\"memoria_media$i\" id=\"memoria_media\" name=\"memoria_media$i\" readonly=\"readonly\"/>
					 <label>Média Geral:</label> <input type=\"text\" class=\"media_geral$i\" id=\"media_geral\" name=\"media_geral$i\" readonly=\"readonly\" />
					 <input type=\"button\" class=\"apagar$i\" id=\"apagar\" value=\"Apagar\" onClick=\"limparDinamica($i,$this->qt_dinamica)\" />
					 <input type=\"button\" class=\"calcular$i\" id=\"calcular\" value=\"Calcular\" onClick=\"validarDinamica($i,$this->qt_dinamica)\"/> 
					 <br /><br />";
	  	}
	}
	
	/*funcao dinamicaInput, para gerar os campos input de texto do formulario da dinamica*/
	
	private function gerarInput() {
		
		/*variavel nome para armazenar as categorias de votacao*/
		
		$nomes = "outro,social,vinculo,corpo,atividade,memoria";
		
		/*variavel valor para armazer o explode na variavel nome, para transforma em array os dados das categorias*/
		
		$valor = explode("," , $nomes);
		
		/*usa o for para imprimir o numero de campos para votacao de acordo com quantidade de participantes e psicologos que iram votar*/
		
		for($i = 1; $i <= $this->qt_dinamica; $i++) {
			
			/*imprimi o campo para votacao, determinando seu name e id pela propriedade controle e id_input*/
		 
			echo "<select id=\"{$valor[$this->controle]}$this->id_input"."_$i\" name=\"{$valor[$this->controle]}$this->id_input"."_$i\">
				  	<option value=\"\"></option>
					<option value=\"1\">1</option>
					<option value=\"2\">2</option>
					<option value=\"3\">3</option>
					<option value=\"4\">4</option>
				  </select>";
		}
		
		/*acrescenta mais um na propriedade controle para cada termino do loop*/
		
		$this->controle ++;
		
		/*se propriedade controle for igual a 6 que é numero das categorias, a propriedade controle começa do zero e acrescenta mais um no id_input*/
		
		if($this->controle == 6) {
		
			$this->controle = 0;
			$this->id_input++;
		}
	}
	
	/*funcao gerarSentimentos, gera o formulario de sentimentos, com os dados dos formularios anteriores*/
	
	public function gerarSentimentos() {
		
		/*soma a quantidade de participantes e psicologos e armazena na propriedade sentimentos*/
		
		$this->qt_sentimentos = $_COOKIE['qt_participante'] + $_COOKIE['qt_psicologo'];
		
		/*armazena as categorias de sentimentos na variavel nome*/

		$nomes = "valor,liberdade,vaidade,satisfacao,desvalor,frustacao,arrependimento,abandono,vergonha,simpatia,estima,carinho,amor,compaixao,confianca,respeito,admiracao,gratidao,antipatia,aversao,odio,ressentimento,magoa,desconfianca,despreso,inveja,ciumes,esperanca,desesperanca,futuro,saudade";
		
		/*usa explode para transformar em array as categorias do sentimentos*/
		
		$valor = explode("," , $nomes);
		
		/*usa o for para gerar os campos de acordo com o numero de participantes e psicologos*/
	
		for($i = 1; $i <= $this->qt_sentimentos; $i++) {
			
			/*imprimi o input(campo para voto) id e name é determinado pela propriedade  controle e a variavel i*/
			
			echo "<p>$i</p><select id=\"{$valor[$this->controle]}$i\" name=\"{$valor[$this->controle]}$i\">
				  	<option value=\"\"></option>
				  	<option value=\"T\">T</option>
				 	<option value=\"M\">M</option>
				  	<option value=\"E\">E</option>
				  	<option value=\"F\">F</option>
				  </select>";
		
		}
		
		if($this->controle == 30) {
			
			echo "<label>Salvar Informações:</label><input type=\"button\" onClick=\"salvarDados($this->qt_dinamica,$this->qt_sentimentos)\" name=\"salvar\" id=\"salvar\"     value=\"Salvar\"/>";
		}
		
		/*quando terminar cada loop com o for, acrescentar mais um na propriedade controle*/
		
		$this->controle++; 
	}
	
	/*funcao criarLegenda, gera legenda pegando os dados de participantes e psicologos do formulario*/
	
	public function criarLegenda() {
		
		/*variavel que armazena a soma de participantes e psicologos*/
		
		$this->qt_pessoas = $_COOKIE['qt_participante'] + $_COOKIE['qt_psicologo'];
		
		/*variavel verifica é igual a false, variavel para controlar*/
		
		$verifica = false;
		
		/*usa o for para imprimir a legenda de acordo com o numero de participantes e psicologos*/
	
		for($i = 1; $i <= $this->qt_pessoas; $i++) {
			
			/*se a variavel i for maior que a quantidade de participantes*/
			
			if($i > $_COOKIE['qt_participante']) {
				
				/*e se a variavel verifica for igual a false a propriedade id_legenda é igual a o e a variavel verifica é igual a true*/
				
				if($verifica == false) {
					
					$this->id_legenda = 1;
					$verifica = true;
				}
				
				/*imprimi a legenda com a propriedade id_legenda para determinar qual o nome do psicologo*/
				
				echo"<h6>$i -</h6> <h7>{$_COOKIE['psicologo'. $this->id_legenda]}</h7>";
			}
			
			/*se nao imprimi o participante, que é determinado pela propriedade id_legenda*/
			
			else {
				
				echo "<h6>$i -</h6> <h7>{$_COOKIE['participante'. $this->id_legenda]}</h7>";
			}
			
			/*para o final de cada looping a propriedade id_legenda acrescenta mais um*/
			
			$this->id_legenda++;
		}
	}
}