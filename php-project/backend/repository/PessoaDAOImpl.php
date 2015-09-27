<?php
	require_once "./../model/Pessoa.php";
	require_once "./../repository/PessoaDAO.php";
	require_once "./../repository/ConnectionSingleton.php";
	require_once "./../repository/GenericDAO.php";
	
	/**
	 * Implementação da interface DAO da entidade pessoa
	 * @author leonardo
	 *
	 */
	Class PessoaDAOImpl extends GenericDAO implements PessoaDAO{
		const _TABLE_NAME = "pessoa";
		const _FIELD_ID = "id";
		const _CLASS_NAME = "Pessoa";
		
		public function __construct(){
			parent::__construct(ConnectionSingleton::getInstance(), self::_TABLE_NAME, self::_FIELD_ID, self::_CLASS_NAME);
		}
	}