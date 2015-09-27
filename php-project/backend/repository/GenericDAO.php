<?php
	require_once "./../repository/DAO.php";
	require_once "./../repository/SQLBuilder.php";
	
	/**
	 * Classe que fornce um DAO genérico
	 * @author leonardo
	 *
	 */
	abstract Class GenericDAO implements DAO{
		private $connection;
		private $tableName;
		private $fieldId;
		private $className;
		
		public function __construct($connection, $tableName, $fieldId, $className){
			$this->connection = $connection;
			$this->tableName = $tableName;
			$this->fieldId = $fieldId;
			$this->className = $className;
		}
		
		public function save($obj){
			$reflection = new ReflectionClass($this->className);
			
			$sql = SQLBuilder::getInsertStatement($this->tableName, $this->fieldId, $reflection->getProperties());
			
			$stmt = $this->connection->prepare($sql);
			
			//Carregando Valores
			$values = array();
			foreach($reflection->getProperties() as $property){
				if(!empty($property->name) && $property->name != $this->fieldId){
					$value = call_user_func(array($obj, "get".$property->name));
					
					array_push($values, $value);
				}
			}
			
			//Realizando bind dos valores
			$count = 0;
			foreach($reflection->getProperties() as $property){
				if(!empty($property->name) && $property->name != $this->fieldId){
					$stmt->bindParam(":" . $property->name, $values[$count], self::_getPDOTypeByValue($values[$count]));
					
					$count++;
				}
			}
			
			$stmt->execute();
		}
		
		//TODO: Refactoring
		public function update($obj){
			$reflection = new ReflectionClass($this->className);
			
			$sql = SQLBuilder::getUpdateStatement($this->tableName, $this->fieldId, $reflection->getProperties());
			
			//TODO: Temporário. Deverá ser migrado para o bindParam
			foreach($reflection->getProperties() as $property){
				$value = call_user_func(array($obj, "get".$property->name));
				
				if(self::_getPDOTypeByValue($value) != PDO::PARAM_INT){
					$value = "'" . $value . "'";
				}
				
				$sql = str_replace(":" . $property->name, $value, $sql);
			}
			
			$stmt = $this->connection->prepare($sql);
			
			$stmt->execute();
		}
		
		public function delete($id){
			$stmt = $this->connection->prepare(SQLBuilder::getDeleteStatement($this->tableName, $this->fieldId));
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			$stmt->execute();
		}
		
		public function findAll(){
			$stmt = $this->connection->query(SQLBuilder::getFindAllStatement($this->tableName));
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		
		public function findOne($id){
			$stmt = $this->connection->prepare(SQLBuilder::getFindOneStatement($this->tableName, $this->fieldId));
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			$stmt->execute();
			
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}
		
		public function getConnection(){
			return $this->connection;
		}
		
		/**
		 * 
		 * Método responsável por retornar o tipo de dado do PDO baseando-se no valor da variável informada
		 * @param $value
		 */
		private function _getPDOTypeByValue($value){
			if(is_int($value)) return PDO::PARAM_INT;
			else if (is_bool($value)) return PDO::PARAM_BOOL;
			else return PDO::PARAM_STR;
		}
	}