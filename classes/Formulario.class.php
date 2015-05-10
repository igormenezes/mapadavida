<?php

/*classe Formulario aonde irá receber valores do formulario dos participantes e psicologos*/

class Formulario {
	
	public function listarParticipantes(){

		/*verifica se a variavel esta com um valor vazio, se estiver encerra a funcao*/
		
		if($_POST["qt_participante"] == "") {
				die();
		}
		
		/*se nao ele da um loop e vai imprimindo label para serem preenchidas, de acordo com a quantidade de participantes*/
		
		else {
				
			for($i = 1; $i <= $_POST["qt_participante"]; $i++) {
			
				echo ("<label>Nome do participante:</label> <input name=\"participante$i\" id=\"participante$i\" type=\"text\" /> <br /><br />
				 <label>Estado Civil:</label> <input name=\"civil$i\" id=\"civil$i\" type=\"text\" /> <br /><br />
				 <label>Profissão da Esposa(o)</label> <input name=\"profissao_esposa$i\" id=\"profissao_esposa$i\" type=\"text\" /> <br /><br />
				 <label>Idade:</label> <input name=\"idade$i\" id=\"idade$i\" type=\"text\" /> <br /><br />
				 <label>Profissão:</label> <input name=\"profissao$i\" id=\"profissao$i\" type=\"text\" /> <br /><br />
				 <label>Telefone:</label> <input name=\"telefone$i\" id=\"telefone$i\" type=\"text\" /> <br /><br />
				 <label>Celular:</label> <input name=\"celular$i\" id=\"celular$i\" type=\"text\" /> <br /><br />
				 <label>E-mail:</label> <input name=\"email$i\" id=\"email$i\" type=\"text\" /> <br /><br />
				 <label>N° de Filhos:</label> <input name=\"filho$i\" id=\"filho$i\" type=\"text\" /> <br /><br />
				 <label>N° de Irmãos:</label> <input name=\"irmao$i\" id=\"irmao$i\" type=\"text\" /> <br /><br />
				<label>Observação:</label> <br /><br />
				<textarea name=\"observacao$i\" id=\"observacao$i\"></textarea>
				<br /><br /><br />");
			}
		}
	}
	
	public function listarPsicologos() {
		
		/*verifica se a variavel esta com um valor vazio, se estiver encerra a funcao*/
		
		if($_POST['qt_psicologo'] == "") {

			die();
		}
		
		/*se nao ele da um loop e vai imprimindo label para serem preenchidas, de acordo com a quantidade de psicologos*/
		
		else {
	
			for($i = 1; $i <= $_POST['qt_psicologo']; $i++) {
			
				echo "<label>Nome do psicologo:</label> <input name=\"psicologo$i\" id=\"psicologo$i\" type=\"text\" /> <br /><br />";
				
			}
		}
	}
}