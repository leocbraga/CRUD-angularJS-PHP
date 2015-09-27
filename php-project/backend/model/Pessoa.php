<?php 
	require_once "./../model/Model.php";

	Class Pessoa implements Model{
			private $id;
			private $nome;
			private $idade;
			private $caracteristicas;
			
			public function __construct(){}
			
			public static function builder($obj){
				$pessoa = new Pessoa();
					
				$pessoa->setId(property_exists($obj, "id") ? $obj->id : 0);
				$pessoa->setNome(property_exists($obj, "nome") ? $obj->nome : "");
				$pessoa->setIdade(property_exists($obj, "idade") ? $obj->idade : 0);
				$pessoa->setCaracteristicas(property_exists($obj, "caracteristicas") ? $obj->caracteristicas : "");
					
				return $pessoa;
			}
			
			public function getId(){
				return $this->id;
			}
			
			public function setId($id){
				$this->id = $id;
			}
			
			public function getNome(){
				return $this->nome;
			}
				
			public function setNome($nome){
				$this->nome = $nome;
			}
			
			public function getIdade(){
				return $this->idade;
			}
				
			public function setIdade($idade){
				$this->idade = $idade;
			}
			
			public function getCaracteristicas(){
				return $this->caracteristicas;
			}
			
			public function setCaracteristicas($caracteristicas){
				$this->caracteristicas = $caracteristicas;
			}
	}