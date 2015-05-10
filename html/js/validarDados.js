/*funcao validar a dinamica*/

function validarDinamica(id,qt) {
	
	/*usa o for para verificar se todos os campos dinamicos de votação foram preenchidos*/
	
	for($i = 1; $i <= qt; $i++) {
		
		/*determina variaveis para pegar valor do id*/
		
		var outro = $("#outro" + id + "_" + $i).val();
		var social = $("#social" + id + "_" + $i).val();
		var vinculo = $("#vinculo" + id + "_" + $i).val();
		var corpo = $("#corpo" + id + "_" + $i).val();
		var atividade = $("#atividade" + id + "_" + $i).val();
		var memoria = $("#memoria" + id + "_" + $i).val();
		
	/*verifica se todos os campos estão nulos*/	
		
		if(outro == ""){

			alert("Preencha o campo " + $i + " do Outro Eu");
			return false;
		}
			
		else if(social == "") {
			
			alert("Preencha o campo " + $i + " Social Família");
			return false;
		}
		
		else if(vinculo == "") {
			
			alert("Preencha o campo " + $i + " Vinculo Afeto");
			return false;
		}
		
		else if(corpo == "") {
			
			alert("Preencha o campo " + $i + " Corpo Cultura");
			return false;
		}
		
		else if(atividade == "") {
			
			alert("Preencha o campo " + $i + " Atividade Profissional Economico");
			return false;
		}
		
		else if(memoria == "") {
			
			alert("Preencha o campo " + $i + " Memoria Social Indentidade");
			return false;
		}
	}
	
	/*caso todos os campos forem preenchidos, chama a funcao calcular*/
	
	Calcular(id,qt);
}

/*funcao calcular, para tirar as medias*/

function Calcular(id,qt) {
	
	/*determina valor zero para os campos, para poder fazer o auto incremento dinamico para somar os votos*/
	
	var	outro_valor = 0;
	var	social_valor = 0;
	var	vinculo_valor = 0;
	var	corpo_valor = 0;
	var	atividade_valor = 0;
	var	memoria_valor = 0;
	
	/*utilizar o for para percorrer todos os campos e pegar seus valores para soma*/
	
	for($i = 1; $i <= qt; $i++) {
		
		/*determina variaveis para pegar o valor do id*/
		
		var outro = $("#outro" + id + "_" + $i).val();
		var social = $("#social" + id + "_" + $i).val();
		var vinculo = $("#vinculo" + id + "_" + $i).val();
		var corpo = $("#corpo" + id + "_" + $i).val();
		var atividade = $("#atividade" + id + "_" + $i).val();
		var memoria = $("#memoria" + id + "_" + $i).val();
		
		/*variavel que foram criadas no começo da funcao, para pegar e ir somando todos os valores de voto*/

		outro_valor += parseInt(outro);
		social_valor += parseInt(social);
		vinculo_valor += parseInt(vinculo);
	    corpo_valor += parseInt(corpo);
		atividade_valor += parseInt(atividade);
		memoria_valor += parseInt(memoria);
	}
	
	/*variaveis que pegam o valor da media de cada categoria*/
	
	var media_outro = outro_valor / qt;
	var media_social = social_valor / qt;
	var media_vinculo = vinculo_valor / qt;
	var media_corpo = corpo_valor / qt;
	var media_atividade = atividade_valor / qt;
	var media_memoria = memoria_valor / qt;
	
	/*variavel que soma todas as medias, e tira a media final*/
	
	var media_geral = (media_outro + media_social + media_vinculo + media_corpo + media_atividade + media_memoria) / 6;
	
	/*mostra os campos das medias, depois de ter feito os calculos e apresentado as medias*/

	$(".outro_media" + id).css("display","block");
	$(".social_media" + id).css("display","block");
	$(".vinculo_media" + id).css("display","block");
	$(".corpo_media" + id).css("display","block");
	$(".atividade_media" + id).css("display","block");
	$(".memoria_media" + id).css("display","block");
	$(".media_geral" + id).css("display","block");
	
	/*some com o botao calcular e mostra o botao apagar, caso queira realizar denovo as medias*/
	
	$(".calcular" + id).css("display","none");
	$(".apagar" + id).css("display","block");
	
	/*determina o valor do id, de acordo com a media*/
	
	$(".outro_media" + id).val(media_outro);
	$(".social_media" + id).val(media_social);
	$(".vinculo_media" + id).val(media_vinculo);
	$(".corpo_media" + id).val(media_corpo);
	$(".atividade_media" + id).val(media_atividade);
	$(".memoria_media" + id).val(media_memoria);
	$(".media_geral" + id).val(media_geral);
}

/*funcao limparDinamica, para limpar os dados das medias e zerar tudo*/

function limparDinamica(id,qt) {
	
	/*usar o for para percorrer todos os campos de voto*/
	
	for($i = 1; $i <= qt; $i++) {
		
		/*determina todos os campos com o valor vazio*/
		
		$("#outro" + id + "_" + $i).val("");
	    $("#social" + id + "_" + $i).val("");
		$("#vinculo" + id + "_" + $i).val("");
		$("#corpo" + id + "_" + $i).val("");
		$("#atividade" + id + "_" + $i).val("");
		$("#memoria" + id + "_" + $i).val("");
	}
	
	/*determina os campos das medias com o valor vazio*/
	
	$(".outro_media" + id).val("");
	$(".social_media" + id).val("");
	$(".vinculo_media" + id).val("");
	$(".corpo_media" + id).val("");
	$(".atividade_media" + id).val("");
	$(".memoria_media" + id).val("");
	$(".media_geral" + id).val("");
	
	/*some com os campos das medias, deixando ocultos*/
	
	$(".outro_media" + id).css("display","none");
	$(".social_media" + id).css("display","none");
	$(".vinculo_media" + id).css("display","none");
	$(".corpo_media" + id).css("display","none");
	$(".atividade_media" + id).css("display","none");
	$(".memoria_media" + id).css("display","none");
	$(".media_geral" + id).css("display","none");
	
	/*mostra o botao para poder calcular as medais, e some com o botao apagar*/
	
	$(".calcular" + id).css("display","block");
	$(".apagar" + id).css("display","none");
}

function salvarDados(qt_dinamica,qt_sentimentos){
	
	/*looping que faz a verificacao se foi preenchido os dados da dinamica*/

	for($i = 1; $i <= qt_dinamica; $i++) {
	
		if($(".outro_media" + $i).val() == "" ) {
			
			alert("Preencha os campos da dinamica corretamente!");
			return false;
		}
		
		else if($(".social_media" + $i).val() == "") {
			
			alert("Preencha os campos da dinamica corretamente!");
			return false;
		}
		
		else if($(".vinculo_media" + $i).val() == "") {
			
			alert("Preencha os campos da dinamica corretamente!");
			return false;
		}
		
		else if($(".corpo_media" + $i).val() == "") {
			
			alert("Preencha os campos da dinamica corretamente!");
			return false;
		}
		
		else if($(".atividade_media" + $i).val() == "") {
			
			alert("Preencha os campos da dinamica corretamente!");
			return false;
		}
		
		else if($(".memoria_media" + $i).val() == "") {
			
			alert("Preencha os campos da dinamica corretamente!");
			return false;
		}
		
		else if($(".media_geral" + $i).val() == "") {
			
			alert("Preencha os campos da dinamica corretamente!");
			return false;
		}
		
	}
	
	/*looping que faz a verificacao se foi preenchido os dados do sentimento*/
	
	for($i = 1; $i <= qt_sentimentos; $i++) {
	
		if ($("#valor" + $i).val() == "") {
		
			alert("Preencha o campo " + $i + " O Sentimento do Próprio Valor!");
			return false;
		}
		
		else if ($("#liberdade" + $i).val() == "") {
		
			alert("Preencha o campo " + $i + " O Sentimento de Liberdade!");
			return false;
		}
		
		else if ($("#vaidade" + $i).val() == "") {
		
			alert("Preencha o campo " + $i + " A Vaidade!");
			return false;
		}
		
		else if ($("#satisfacao" + $i).val() == "") {
		
			alert("Preencha o campo " + $i + " O Contentamento e a Satisfação!");
			return false;
		}

		else if ($("#desvalor" + $i).val() == "") {
		
			alert("Preencha o campo " + $i + " O Sentimento de Desvalor!");
			return false;
		}
		
		else if ($("#frustacao" + $i).val() == "") {
		
			alert("Preencha o campo " + $i + " O Sentimento de Frustação!");
			return false;
		}
		
		else if ($("#arrependimento" + $i).val() == "") {
		
			alert("Preencha o campo " + $i + " O Arrependimento!");
			return false;
		}
		
		else if ($("#abandono" + $i).val() == "") {
		
			alert("Preencha o campo " + $i + " O Sentimento de Abandono!");
			return false;
		}
		
		else if ($("#vergonha" + $i).val() == "") {
		
			alert("Preencha o campo " + $i + " A Vergonha!");
			return false;
		}
		
		else if ($("#simpatia" + $i).val() == "") {
		
			alert("Preencha o campo " + $i + " A Simpatia!");
			return false;
		}
		
		else if ($("#estima" + $i).val() == "") {
		
			alert("Preencha o campo " + $i + " A Estima!");
			return false;
		}
		
		else if ($("#carinho" + $i).val() == "") {
		
			alert("Preencha o campo " + $i + " O Carinho!");
			return false;
		}
		
		else if ($("#amor" + $i).val() == "") {
		
			alert("Preencha o campo " + $i + " O Amor!");
			return false;
		}
		
		else if ($("#compaixao" + $i).val() == "") {
		
			alert("Preencha o campo " + $i + " A Compaixão!");
			return false;
		}
		
		else if ($("#confianca" + $i).val() == "") {
		
			alert("Preencha o campo " + $i + " A Confiança!");
			return false;
		}
		
		else if ($("#respeito" + $i).val() == "") {
		
			alert("Preencha o campo " + $i + " A Consideração e o Respeito!");
			return false;
		}
		
		else if ($("#admiracao" + $i).val() == "") {
		
			alert("Preencha o campo " + $i + " A Admiração!");
			return false;
		}
		
		else if ($("#gratidao" + $i).val() == "") {
		
			alert("Preencha o campo " + $i + " A Gratidão!");
			return false;
		}
		
		else if ($("#antipatia" + $i).val() == "") {
		
			alert("Preencha o campo " + $i + " A Antipatia!");
			return false;
		}
		
		else if ($("#aversao" + $i).val() == "") {
		
			alert("Preencha o campo " + $i + " A Aversão!");
			return false;
		}
		
		else if ($("#odio" + $i).val() == "") {
		
			alert("Preencha o campo " + $i + " O Ódio!");
			return false;
		}
		
		else if ($("#ressentimento" + $i).val() == "") {
		
			alert("Preencha o campo " + $i + " O Ressentimento!");
			return false;
		}
		
		else if ($("#magoa" + $i).val() == "") {
		
			alert("Preencha o campo " + $i + " A Mágoa!");
			return false;
		}
		
		else if ($("#desconfianca" + $i).val() == "") {
		
			alert("Preencha o campo " + $i + " A Desconfiança!");
			return false;
		}
		
		else if ($("#despreso" + $i).val() == "") {
		
			alert("Preencha o campo " + $i + " O Despreso!");
			return false;
		}
		
		else if ($("#inveja" + $i).val() == "") {
		
			alert("Preencha o campo " + $i + " A Inveja!");
			return false;
		}
		
		else if ($("#ciumes" + $i).val() == "") {
		
			alert("Preencha o campo " + $i + " O Ciúmes!");
			return false;
		}
		
		else if ($("#esperanca" + $i).val() == "") {
		
			alert("Preencha o campo " + $i + " A Espera e a Esperança!");
			return false;
		}
		
		else if ($("#desesperanca" + $i).val() == "") {
		
			alert("Preencha o campo " + $i + " A Desesperança!");
			return false;
		}
		
		else if ($("#futuro" + $i).val() == "") {
		
			alert("Preencha o campo " + $i + " A Preocupação com o Futuro!");
			return false;
		}
		
		else if ($("#saudade" + $i).val() == "") {
		
			alert("Preencha o campo " + $i + " A Nostalgia e a Saúdade!");
			return false;
		}																														
	}
	
	/*se tudo for preenchido da um submit no formulario para enviar as informacoes*/
	
	$("#formulario2").submit();
}
