define([], function(){
	return function($routeProvider, PessoaService){
		
		$routeProvider.when("/pessoas", {
	        templateUrl: "pessoa-module/view/pessoas.html",
	        controller: "PessoasController",
	        resolve: {
	        	pessoas: function(PessoaService){
	        		return PessoaService.findAll();
	        	}
	        }
		});
		
		$routeProvider.when("/pessoas/new", {
	        templateUrl: "pessoa-module/view/pessoaForm.html",
	        controller: "PessoaFormController",
	        resolve: {
	        	pessoas: function(PessoaService){
	        		return PessoaService.findAll();
	        	}
	        }
		});
	}
});