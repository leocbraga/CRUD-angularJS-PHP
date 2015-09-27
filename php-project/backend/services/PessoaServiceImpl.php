<?php
	require "./../services/PessoaService.php";
	require "./../repository/PessoaDAOImpl.php";
	
	/**
	 * Classe com a implementação do serviço
	 * @author leonardo
	 *
	 */
	Class PessoaServiceImpl implements PessoaService{
		private $repository;
		
		public function __construct(){
			$this->repository = new PessoaDAOImpl();
		}
		
		public function save($obj){
			if($obj->getId() != null && $obj->getId() > 0){
				return $this->getRepository()->update($obj);
			}
			
			return $this->getRepository()->save($obj);
		}
		
		public function delete($id){
			$this->getRepository()->delete($id);
		}
		
		public function findAll(){
			return $this->getRepository()->findAll();
		}
		
		public function findOne($id){
			return $this->getRepository()->findOne($id);
		}
		
		public function getRepository(){
			return $this->repository;
		}
	}
	