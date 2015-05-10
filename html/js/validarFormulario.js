/*funcao para verificar o numero de participantes e fazer validacao*/

function verificarParticipantes() {
	
	/*faz um loop para verificar quantidade de participantes, e ir validando todos os campos de acordo*/
	
	for($i = 1; $i <= $("#qt_participante").val(); $i++) {
		
		if( $("#participante" + $i).val() == "" || isNaN($("#participante" + $i).val()) == false) {
			
			alert("Preencha o campo " + $i + " do Nome do Participante corretamente!");
			return false;
		}
		
		if( $("#civil" + $i).val() == "" || isNaN($("#civil" + $i).val()) == false) {
			
			alert("Preencha o campo " + $i + " do Estado Civil corretamente!");
			return false;
		}
		
		if( $("#idade" + $i).val() == "" || isNaN($("#idade" + $i).val()) == true) {
			
			alert("Preencha o campo " + $i + " da Idade corretamente!");
			return false;
		}
		
		if( $("#profissao" + $i).val() == "" || isNaN($("#profissao" + $i).val()) == false) {
			
			alert("Preencha o campo " + $i + " da Profissão corretamente!");
			return false;
		}
		
		if( $("#telefone" + $i).val() == "" || isNaN($("#telefone" + $i).val()) == true) {
			
			alert("Preencha o campo " + $i + " do Telefone corretamente!");
			return false;
		}
		
		if( isNaN($("#filho" + $i).val()) == true) {
			
			alert("Preencha o campo " + $i + " do Numero de Filhos corretamente!");
			return false;
		}
		
		if( isNaN($("#irmao" + $i).val()) == true) {
			
			alert("Preencha o campo " + $i + " do Numero de Irmãos corretamente!");
			return false;
		}
		
		if( $("#email" + $i).val() == "" || isNaN($("#email" + $i).val()) == false) {
			
			alert("Preencha o campo " + $i + " do Email corretamente!");
			return false;
		}
	}
	
	verificarPsicologos();
}

/*funcao para verificar o numero de psicologos e fazer validacao*/

function verificarPsicologos() {
	
	/*faz um loop para verificar quantidade de psicologos, e ir validando todos os campos de acordo*/

	for($i = 1; $i <= $("#qt_psicologo").val(); $i++) {
		
		if( $("#psicologo" + $i).val() == "" || isNaN($("#psicologo" + $i).val()) == false) {
			
			alert("Preencha o campo " + $i + " do Nome do Psicologo corretamente!");
			return false;
		}
	}
	alert("Operação foi realizada com sucesso!");
	$("#formulario").submit();
}