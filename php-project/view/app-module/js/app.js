define(["angular", "ngRoute", "ngTranslate", "appConfig", "appValue", "appMainController", "pessoaModule"], function(angular, ngRoute, ngTranslate, appConfig, appValue, appMainController, pessoaModule){
	
	//Criando os módulos
	angular.module("app", ["ngRoute", "pascalprecht.translate", "pessoaModule"]);
	
	//Adicionando Value
	angular.module("app").value("AppValue", appValue);
	
	
	//Adicionando Configuradores
	angular.module("app").config(["$routeProvider", appConfig]);
	
	//Adicionando Controller
	angular.module("app").controller("AppMainController", ["$scope", appMainController]);
});