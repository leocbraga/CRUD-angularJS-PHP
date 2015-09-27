<?php
	require "./../../lib/Slim-2.6.2/Slim/Slim.php";
	require "./../services/PessoaServiceImpl.php";
	require "./CorsUtil.php";
	
	/**
	 * Controlador do recurso pessoa
	 */
	\Slim\Slim::registerAutoloader();
	$app = new \Slim\Slim();
	
	$app->get('/pessoas', function () {
    	$service = new PessoaServiceImpl();
    	echo json_encode($service->findAll());
	});
	
	$app->get("/pessoas/:id", function($id){
		$service = new PessoaServiceImpl();
		echo json_encode($service->findOne($id));
	});
	
	$app->delete("/pessoas/:id", function($id) use ($app){
		$service = new PessoaServiceImpl();
		$service->delete($id);
		
		$app->response->setStatus(200);
	});
	
	$app->post("/pessoas", function() use ($app){
		$service = new PessoaServiceImpl();
		
		$json = $app->request->getBody();
		
		//Transformando no meu objeto de negócio
		$pessoa = Pessoa::builder(json_decode($json));
		
		echo json_encode($service->save($pessoa));
		
		$app->response->setStatus(201);
	});
	
	$app->put("/pessoas", function() use ($app){
		$service = new PessoaServiceImpl();
	
		$json = $app->request->getBody();
	
		//Transformando no meu objeto de negócio
		$pessoa = Pessoa::builder(json_decode($json));
	
		echo json_encode($service->save($pessoa));
	
		$app->response->setStatus(200);
	});
	
	$app->run();