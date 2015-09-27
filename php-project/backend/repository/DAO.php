<?php
	/**
	 * Interface com os métodos básicos de um DAO
	 * @author leonardo
	 *
	 */
	interface DAO{
		/**
		 * 
		 * Salvar um registro
		 * @param $obj
		 */
		public function save($obj);
		
		/**
		 * Atualizar um objeto
		 * @param $obj
		 */
		public function update($obj);
		
		/**
		 * 
		 * Remover um registro
		 * @param $id
		 */
		public function delete($id);
		
		/**
		 * 
		 * Buscar todos os registros
		 */
		public function findAll();
		
		/**
		 * 
		 * Buscar um registro pelo seu identificador
		 * @param $id
		 */
		public function findOne($id);
	}