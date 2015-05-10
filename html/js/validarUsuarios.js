
function validarUsuarios() {
	
	if( $("#nome_usuario").val() == "" || isNaN($("#nome_usuario").val()) == false) {
		
		alert("Preencha o campo Nome do Usuario corretamente!");
	}
	
	else if($("#email_usuario").val() == "") {
		
		alert("Preencha o campo E-mail corretamente!");	
	}
	
	else if($("#login_usuario").val() == "") {
		
		alert("Preencha o campo Login corretamente!");	
	}
	
	else if($("#senha_usuario").val() == "") {
		
		alert("Preencha o campo Senha corretamente!");	
	}
	
	else {
		
		$("#formulario3").submit();
	}
	
}
