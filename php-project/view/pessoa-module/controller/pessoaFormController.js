define([], function(){
	return function($scope, $location, PessoaService){
		
		$scope.salvar = function(pessoa){
			PessoaService.save(pessoa).then(function(success){
				$location.path("/pessoas");
			});
		}
	}
});