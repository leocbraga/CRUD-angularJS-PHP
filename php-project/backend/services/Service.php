<?php
	/**
	 * Interface com os métodos básicos de CRUD
	 * @author leonardo
	 *
	 */
	interface Service{
		/**
		 * Salvar um registro
		 * @param unknown_type $obj
		 */
		public function save($obj);
		
		/**
		 * Apagar um registro
		 * @param $id
		 */
		public function delete($id);
		
		/**
		 * Busar todos os registros 
		 */
		public function findAll();
		
		/**
		 * Buscar um registro em uma tabela
		 * @param $id
		 */
		public function findOne($id);
	}