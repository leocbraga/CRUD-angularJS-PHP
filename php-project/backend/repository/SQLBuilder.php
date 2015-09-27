<?php
	/**
	 * Classe responsável por realizar as operações de construção de statements SQL
	 * @author leonardo
	 *
	 */
	class SQLBuilder{
		
		/**
		 * Método responsável por criar o statement sql para buscar todos os registros de uma tabela
		 * @param $tableName
		 */
		public static function getFindAllStatement($tableName){
			$sql = "select * from [[tableName]]";
			$sql = str_replace("[[tableName]]", $tableName, $sql);
			
			return $sql;
		}
		
		/**
		 *  Método responsável por criar o statement sql de remoção de um registro de uma tabela
		 * @param $tableName
		 * @param $fieldId
		 */
		public static function getDeleteStatement($tableName, $fieldId){
			$sql = "delete from [[tableName]] where [[fieldId]] = :id";
			
			$sql = self::_replaceTableName($sql, $tableName);
			$sql = self::_replaceFieldId($sql, $fieldId);
			
			return $sql;
		}
		
		/**
		 * Método responsável por criar o statement sql para buscar um regitro em um tabela
		 * @param $tableName
		 * @param $fieldId
		 */
		public static function getFindOneStatement($tableName, $fieldId){
			$sql = "select * from [[tableName]] where [[fieldId]] = :id";
			
			$sql = self::_replaceTableName($sql, $tableName);
			$sql = self::_replaceFieldId($sql, $fieldId);
			
			return $sql;
		}
		
		/**
		 * Método responsável por criar o statement sql para inserção de um registro em uma tabela
		 * @param $tableName
		 * @param $fieldId
		 * @param $properties
		 */
		public static function getInsertStatement($tableName, $fieldId, $properties){
			$sql = "insert into [[tableName]] (";
			
			$sql .= self::_getPropertiesInsert($properties, $fieldId, "");
			
			$sql .= ") values (";
			
			$sql .= self::_getPropertiesInsert($properties, $fieldId, ":");
			
			$sql .= ")";
			
			$sql = self::_replaceTableName($sql, $tableName);
			
			return $sql;
		}
		
		public static function getUpdateStatement($tableName, $fieldId, $properties){
			$sql = "update [[tableName]] set ";
			
			$sql .= self::_getPropertiesUpdate($properties, $fieldId, "");
			
			$sql .= " where [[fieldId]]" . " = :" . $fieldId;
			
			$sql = self::_replaceTableName($sql, $tableName);
			
			$sql = self::_replaceFieldId($sql, $fieldId);
			
			return $sql;
		}
		
		/**
		 * Método responsável por criar a lista de valores de inserção no statement insert
		 * @param $properties
		 * @param $fieldId
		 * @param $prefix
		 */
		private static function _getPropertiesInsert($properties, $fieldId, $prefix){
			$sql = "";
			
			$first = true;
			foreach($properties as $property){
				if($property->name != $fieldId){
					if($first){
						$first = false;
						$sql .= $prefix . $property->name;
					}else{
						$sql .= ", " . $prefix . $property->name;
					}
				}
			}
			
			return $sql;
		}
		
		/**
		 * Método responsável por criar a lista de valores de atualização no statement update
		 * @param $properties
		 * @param $fieldId
		 * @param $prefix
		 */
		private static function _getPropertiesUpdate($properties, $fieldId, $prefix){
			$sql = "";
				
			$first = true;
			foreach($properties as $property){
				if($property->name != $fieldId){
					if($first){
						$first = false;
						$sql .= $prefix . $property->name;
					}else{
						$sql .= ", " . $prefix . $property->name;
					}
					
					$sql .= " = :" . $property->name;
				}
			}
				
			return $sql;
		}
		
		/**
		 * Método responsável por substituir o nome da tabela em um statement
		 * @param $sql
		 * @param $tableName
		 */
		private static function _replaceTableName($sql, $tableName){
			return str_replace("[[tableName]]", $tableName, $sql);
		}
		
		/**
		 * Método responsável por substituir o fieldId em um statement
		 * @param $sql
		 * @param $fieldId
		 */
		private static function _replaceFieldId($sql, $fieldId){
			return str_replace("[[fieldId]]", $fieldId, $sql);
		}
	}