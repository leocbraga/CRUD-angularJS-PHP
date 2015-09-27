define(["angular", "ngRoute", "ngTranslate", "pessoaValue", "appValue", "pessoasController", "pessoaFormController", "pessoaService"], function(angular, ngRoute, ngTranslate, pessoaValue, appValue, pessoasController, pessoaFormController, pessoaService){
	var _pessoaModule = angular.module("pessoaModule", ["ngRoute", "ngResource", "pascalprecht.translate"]);
	
	//Value
	angular.module("pessoaModule").factory("PessoaValue", pessoaValue(appValue.baseUrl));
	
	
	//Service
	angular.module("pessoaModule").factory("PessoaService", ["PessoaValue", "$resource", pessoaService]);
	
	//Controllers
	angular.module("pessoaModule").controller("PessoasController", ["$scope", "$location", "$route", "PessoaService", "pessoas", pessoasController]);
	
	angular.module("pessoaModule").controller("PessoaFormController", ["$scope", "$location", "PessoaService", pessoaFormController]);
});