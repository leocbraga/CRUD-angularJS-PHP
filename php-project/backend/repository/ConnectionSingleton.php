<?php 
	
	/**
	 * Classe Singleton de uma instância de conexão com PDO
	 * @author leonardo
	 *
	 */
	Class ConnectionSingleton{
		const _HOST = "localhost";
		const _DATABASE = "pessoa";
		const _USER = "root";
		const _PASSWORD = "admin";
		
		private static $connection;
		
		/**
		 * Método responsável por retornar a instância única
		 */
		public static function getInstance(){
			if(!isset(ConnectionSingleton::$connection) && empty(ConnectionSingleton::$connection)){
				ConnectionSingleton::$connection = new PDO('mysql:host='.self::_HOST.';dbname='.self::_DATABASE.';charset=utf8', self::_USER, self::_PASSWORD);
			}
			
			return ConnectionSingleton::$connection;
		}
	}
?>