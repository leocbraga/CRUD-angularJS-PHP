/**
 * Configuração de paths e dependências
 */
requirejs.config({
    baseUrl: "./",
    paths: {
    	app: "app-module/js/app",
    	
    	 /**
         * Jquery
         */
        jquery: "js/bower_components/jquery/dist/jquery",
    	
    	/**
    	 * Angular
    	 */
    	angular: "js/bower_components/angular/angular",
    	ngRoute: "js/bower_components/angular-route/angular-route",
        ngResource: "js/bower_components/angular-resource/angular-resource",
        ngTranslate: "js/bower_components/angular-translate/angular-translate",
//        ngMaterial: "js/bower_components/material-design-lite/material.min.js",
        	
        	
    	/**
    	 * App-Module
    	 */
         appModule: "app-module/js/app",
         appValue: "app-module/value/appValue",
         appConfig: "app-module/config/appConfig",
         appMainController: "app-module/controller/appMainController",
        	 
         /**
          * Pessoa-Module
          */
         pessoaModule: "pessoa-module/js/pessoa-module",
         pessoaValue: "pessoa-module/value/pessoaValue",
         pessoaService: "pessoa-module/service/pessoaService",
         pessoasController: "pessoa-module/controller/pessoasController",
         pessoaFormController: "pessoa-module/controller/pessoaFormController"
    },
    shim: {
    	angular: {
    		exports: "angular",
    		deps: ["jquery"]
    	},
    	ngRoute: {
    		deps: ["angular"],
    	},
    	ngResource: {
    		deps: ["angular"]
    	},
    	ngTranslate: {
    		deps: ["angular"]
    	},
    	ngMaterial: {
    		deps: ["angular"]
    	},
    	
    	/**
    	 * App-Module
    	 */
    	appValue: {
    		deps: ["angular"]
    	},
    	appConfig: {
    		deps: ["angular", "ngRoute"]
    	},
    	appMainController: {
    		deps: ["angular"]	
    	},
    	appModule: {
    		deps: ["appValue", "appConfig", "appMainController", "pessoaModule"]
    	},
    	
    	/**
    	 * Pessoa Module
    	 */
    	pessoaValue: {
    		deps: ["angular"]
    	},
    	pessoaService: {
    		deps: ["pessoaValue", "ngResource"]
    	},
    	pessoaMainController: {
    		deps: ["angular", "pessoaService"]
    	},
    	pessoaFormController: {
    		deps: ["angular", "pessoaService"]
    	},
    	pessoaModule: {
    		deps: ["pessoasController", "pessoaFormController"]
    	}
    }
}); 

/**
 * Iniciando o bootstap AMD
 */
require(["app"], function(app){
	angular.bootstrap(document, ["app"]);
});
