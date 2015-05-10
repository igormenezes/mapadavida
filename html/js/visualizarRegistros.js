function visualizar(id,qt_registros){
	
	for($i = 0; $i < qt_registros; $i++) {
		
		if($i == id){
			
			$(".dados_completos" + $i).css("display","block");
			$(".fechar" + $i).css("display","block");
		}
		
		else{
			
			$(".dados_completos" + $i).css("display","none");
			$(".fechar" + $i).css("display","none");	
		}
	}
}

function fechar(id,qt_registros){
	
	$(".dados_completos" + id).css("display","none");
	$(".fechar" + id).css("display","none");
}
