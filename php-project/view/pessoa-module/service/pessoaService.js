define([], function(){
	return function (PessoaValue, $resource){
		var _resources = {
			pessoas: $resource(PessoaValue.urlPessoas, {}, 
				{
					query: {method: "GET", isArray: true},
					create: {method: "POST"}
				}
			),
			pessoa: $resource(PessoaValue.urlPessoa, {},
				{
					remove: {method: "DELETE", params: {id: "@id"}}
				}
			)
					
		};
		
		return {
			findAll: function(){
				return _resources.pessoas.query({}).$promise;
			},
			save: function(pessoa){
				return _resources.pessoas.create(pessoa).$promise;
			},
			remove: function(_id){
				return _resources.pessoa.remove({id: _id}).$promise;
			}
		}
	}
});