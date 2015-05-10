<?php

class Banco {

	private static $banco;
	private $pdo;
	
	public static function instanciar() {
		
		try{
		
			global $configuracao;
		
			if(!self::$banco) {
			
				self::$banco = new Banco;
				self::$banco->conectar($configuracao['servidor'],$configuracao['banco'],$configuracao['usuario'],$configuracao['senha']);
			}
			
			return self::$banco;
		}
		
		catch(PDOException $mensagem) {
		
			die("Informações incorretas do banco de dados! " . $mensagem->getLine() . ' # ' . $mensagem->getFile() . ' # ' . $mensagem->getMessage());		
		}
	}
	
	public function conectar($servidor,$banco,$usuario,$senha) {
		
		try{
	
			$this->pdo = new PDO("mysql:host=$servidor;dbname=$banco",$usuario,$senha);
		}
		
		catch(PDOException $mensagem) {
		
			die ("Não foi possivel conectar no banco! " . $mensagem->getLine() . ' # ' . $mensagem->getFile() . ' # ' . $mensagem->getMessage());
		}
	}
	
	public function inserir($oque,$tabela) {
		
		try{
	
			foreach($oque as $coluna => $valor) {
			
				$colunas[] = $coluna;
				$valores[] = "?";
				$executar[] = $valor;
			
			}
			
			$colunas = implode(",",$colunas);
			$valores = implode(",",$valores);
			
			$statement = $this->pdo->prepare("INSERT INTO $tabela ($colunas) VALUES ($valores)");
			$statement->execute($executar);
		}
		
		catch(PDOException $mensagem) {
		
			die ("Não foi possivel inserir dados no banco! " . $mensagem->getLine() . ' # ' . $mensagem->getFile() . ' # ' . $mensagem->getMessage());
		}
	}
	
	public function atualizar($oque,$tabela,$id) {
	
		try {
			
			foreach($oque as $coluna => $valor) {
			
				$colunas[] = "$coluna = ?";
				$executar[] = $valor;
			}
			
			$executar[] = $id;
			
			$colunas = implode(",",$colunas);
			
			$statement = $this->pdo->prepare("UPDATE $tabela SET $colunas WHERE id = ?");
			$statement->execute($executar);
		}
		
		catch(PDOException $mensagem) {
			
			die ("Não foi possivel atualizar informações no banco! " . $mensagem->getLine() . ' # ' . $mensagem->getFile() . ' # ' . $mensagem->getMessage());
		}
	}
	
	public function deletar($tabela,$id) {
		
		try {
		
			$executar[] = $id;
		
			$statement = $this->pdo->prepare("DELETE FROM $tabela WHERE id = ?");
			$statement->execute($executar);
		}
		
		catch(PDOException $mensagem) {
		
			die ("Não foi possivel deletar informações do banco! " . $mensagem->getLine() . ' # ' . $mensagem->getFile() . ' # ' . $mensagem->getMessage());
		}
	}
	
	public function contar($tabela){
		
		try {
		
			$statement = $this->pdo->prepare("SELECT COUNT(id) FROM $tabela");
			$statement->execute();
			$contador = $statement->fetch(PDO::FETCH_ASSOC);
			return $contador;
		}
		
		catch(PDOException $mensagem) {
			
			die("Não foi possivel deletar informações do banco! " . $mensagem->getLine() . ' # ' . $mensagem->getFile() . ' # ' . $mensagem->getMessage());
		}		
	}
	
	public function listar($oque,$tabela,$id) {
		
		try {
		
			foreach($oque as $valor) {
			
				$valores[] = $valor;
			}
			
			$executar[] = $id;
			$valores = implode(",",$valores);
		
			$statement = $this->pdo->prepare("SELECT $valores FROM $tabela WHERE id = ?");
			$statement->execute($executar);
			$resultado = $statement->fetch(PDO::FETCH_ASSOC);
			return $resultado;
		}
		
		catch(PDOException $mensagem) {
		
			die ("Não foi possivel listar as informações do banco! " . $mensagem->getLine() . ' # ' . $mensagem->getFile() . ' # ' . $mensagem->getMessage());
		}
	}
	
	public function listarTudo($tabela) {
		
		try {
	
			$statement = $this->pdo->prepare("SELECT * FROM $tabela ORDER BY id ASC");
			$statement->execute();
			$resultado = $statement->fetchAll(PDO::FETCH_ASSOC);
			return $resultado;
		}
		
		catch(PDOException $mensagem) {
		
			die ("Não foi possivel listar todas as informações do banco! " . $mensagem->getLine() . ' # ' . $mensagem->getFile() . ' # ' . $mensagem->getMessage());
		}
	}
	
	public function listarId($tabela,$id) {
		
		try {
		
			$executar[] = $id;
			
			$statement = $this->pdo->prepare("SELECT * FROM $tabela WHERE id = ?");
			$statement->execute($executar);
			$resultado = $statement->fetch(PDO::FETCH_ASSOC);
			return $resultado;
		}
		
		catch(PDOException $mensagem) {
		
			die ("Não foi possivel listar pelo id as informações do banco! " . $mensagem->getLine() . ' # ' . $mensagem->getFile() . ' # ' . $mensagem->getMessage());
			
		}
	}
	
	public function listarIdUsuario($tabela,$id) {
		
		try {
		
			$executar[] = $id;
			
			$statement = $this->pdo->prepare("SELECT * FROM $tabela WHERE id_usuario = ?");
			$statement->execute($executar);
			$resultado = $statement->fetchAll(PDO::FETCH_ASSOC);
			return $resultado;
		}
		
		catch(PDOException $mensagem) {
		
			die ("Não foi possivel listar pelo id as informações do banco! " . $mensagem->getLine() . ' # ' . $mensagem->getFile() . ' # ' . $mensagem->getMessage());
			
		}
	}	
	
	public function listarNome($tabela,$nome_participante) {
		
		try {
		
			$executar[] = $nome_participante;
		
			$statement = $this->pdo->prepare("SELECT * FROM $tabela WHERE nome_participante = ?");
			$statement->execute($executar);
			$resultado = $statement->fetch(PDO::FETCH_ASSOC);
			return $resultado;
		}
		
		catch(PDOException $mensagem) {
		
			die ("Não foi possivel listar pelo nome as informações do banco! " . $mensagem->getLine() . ' # ' . $mensagem->getFile() . ' # ' . $mensagem->getMessage());
		}
	}
	
	public function listarLimit($tabela,$inicio,$fim) {
		
		try {
			
			$statement = $this->pdo->prepare("SELECT * FROM $tabela LIMIT $inicio,$fim ");
			$statement->execute();
			$resultado = $statement->fetchall(PDO::FETCH_ASSOC);
			return $resultado;
		}
		
		catch(PDOException $mensagem) {
				
			die ("Não foi possivel listar por limite as informações do banco! " . $mensagem->getLine() . ' # ' . $mensagem->getFile() . ' # ' . $mensagem->getMessage());
		}
	}
}