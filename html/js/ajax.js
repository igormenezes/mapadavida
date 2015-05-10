/*funcao ajax, carrega o formulario para iniciar o processo*/
function ajax() {
	$("#conteudo").load("/formulario");	

}

/*funcao que usa ajax para aparecer a quantidade de participantes escolhida*/
	
function quantidadeParticipante() {
	
		$("#participantes").load("ajax",{qt_participante:$("#qt_participante").val()});
		
		/*se for selecionada uma quantidade de participantes, aparece para seleciona as quantidades de psicologo, nome do psicologo e botao para comecar a dinamica*/
		
		if($("#qt_participante").val() != "") {
			
			$("#quantidadepsicologos").css("display","block");
			$("#psicologos").css("display","block");
			
			/*se a quantidade de psicologos tiver algum valor, entao aparece o botao para comecar dinamica*/
			
			if ($("#qt_psicologo").val() != "") {
	
				$("#botao_dinamica").css("display","block");
		
			}
			
		}
		
		/* caso nao for selecionado a quantidade de participantes, nao aparece a quantidade de psicologos para selecionar. E também some com os campos para inserir nomes dos psicologos se tiver e botao da dinamica*/
		
		else {
			
			$("#quantidadepsicologos").css("display","none");
			$("#psicologos").css("display","none");
			$("#botao_dinamica").css("display","none");
		}
}

/*funcao que usa ajax para aparecer a quantidade de psicologos escolhida*/

function quantidadePsicologo() {
	
	$("#psicologos").load("ajax",{qt_psicologo:$("#qt_psicologo").val()});
	
	/*se a quantidade de psicologos tiver algum valor, entao aparece o botao para comecar dinamica*/
	
	if ($("#qt_psicologo").val() != "") {
		
		$("#botao_dinamica").css("display","block");
	}
	
	/*se a quantidade de psicologos ainda nao foi definida, entao o botao para comecar a dinamica ainda nao aparecera*/
	
	else {
		$("#botao_dinamica").css("display","none");	
	}
}