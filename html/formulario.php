<form name="formulario" id="formulario" method="post" action="/cookie">
	<div id="quantidade_participantes">
        <label>Quantidade de Participantes:</label>
        <select onChange="quantidadeParticipante()" name="qt_participante" id="qt_participante">
            <option  value=""></option>
            <option  value="1">1</option>
            <option  value="2">2</option>
            <option  value="3">3</option>
            <option  value="4">4</option>
            <option  value="5">5</option>
            <option  value="6">6</option>
            <option  value="7">7</option>
            <option  value="8">8</option>
            <option  value="9">9</option>
            <option  value="10">10</option>
            <option  value="11">11</option>
            <option  value="12">12</option>
        </select>
    </div>    
    <br /><br /> 
    <div id="participantes">
    </div> 
    <div id="quantidadepsicologos">  
        <label>Quantidade de Psicologos:</label> 
        <select onChange="quantidadePsicologo()" name="qt_psicologo" id="qt_psicologo">
            <option value=""></option>
            <option value="1">1</option>
            <option value="2">2</option>
        </select>
    </div>    
    <br /><br /> 
    <div id="psicologos">
    </div>
    <div id="botao_dinamica">
    	<input id="comeca_dinamica" name="comeca_dinamica" type="button" onClick="verificarParticipantes()" value="Começar" />
    </div>    
</form>