define([], function(){
	return function(baseUrl){
		return function(){
			return {
				urlPessoas: baseUrl + "pessoa.php/pessoas",
				urlPessoa: baseUrl + "pessoa.php/pessoas/:id"
			}
		}
	}
});