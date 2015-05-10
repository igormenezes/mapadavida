
function validarRegistros() {
	
	if( $("#estado_civil").val() == "" || isNaN($("#estado_civil").val()) == false ) {
		
		alert("Preencha os campos corretamente!");
	}
	
	else if( $("#profissao").val() == "" || isNaN($("#profissao").val()) == false ){
		
		alert("Preencha o campo Profissão corretamente!");
	}
	
	else if( $("#idade").val() == "" || isNaN($("#idade").val()) == true ){
		
		alert("Preencha o campo Idade corretamente!");
	}
	
	else if( $("#telefone").val() == "" || isNaN($("#telefone").val()) == true ){
		
		alert("Preencha o campo Idade corretamente!");
	}
	
	else if( $("#email").val() == ""){
		
		alert("Preencha o campo E-mail corretamente!");
	}			
	
	else {
		
		$("#formulario3").submit();
	}
	
}
