<?php
	/**
	 * Interface que representa uma classe de modelo
	 * @author leonardo
	 *
	 */
	interface Model{

		/**
		 * Método responsável por retornar o Id da entidade
		 */
		public function getId();
		
		/**
		 * Método, seguindo o pattern builder, que tem como objetivo criar um objeto da entidade especificada seguindo os
		 * padrões informados pelo objeto enviado
		 * @param unknown $obj
		 */
		public static function builder($obj);
	}