define([], function(){
	return function($scope, $location, $route, PessoaService, pessoas){
		$scope.pessoas = pessoas;
		
		$scope.remove = function(_id){
			PessoaService.remove(_id).then(function(success){
				$route.reload();
			});
		}
	}
});