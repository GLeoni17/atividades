$(function() {

	$(".modalbtn").click(function() {
        $(".modal").css("display", "block");
    });

	$(".close").click(function() {
        $(".modal").css("display", "none");
    });

	$(".cancelbtn").click(function() {
        $(".modal").css("display", "none");
    });
	
	$(window).click(function(event) {
		//var target = event.target;
		//if (target.className=="modal") {
			//$(".modal").css("display", "none");
		//}
		var target = $(event.target);
		if(target.is($(".modal"))) {
			$(".modal").css("display", "none");
		}
	});

	$("#submeter").click(function(){
		if($("#lembrete").is(":checked")){
			let email64 = btoa($("#email").val()); //criptografando para base64
			localStorage.setItem("email", email64); //chave e valor
			//localStorage.setItem("teste", "valor teste");
		}else{
			if(localStorage.getItem("email")){
				localStorage.removeItem("email");
			}
		}
	});

	getItemLocalStorage();

	/*localStorage*/
	/*Web Storage (HTML5)*/
	/*
	1 tamanho dos dados
	(cookies -> 4kb; localStorage -> 5mb)
	Nao grava localStorage via PHP

	2- Dados gravados em uma localStorage não são transmitidos entre cliente e servidos a cada nova requisição

	3- Não possuem tempo para expiração

	*/

});

function getItemLocalStorage(){

	for(let i = 0; i < localStorage.length; i++){
		let chave = localStorage.key(i);
		let valor = localStorage.getItem(i);
		console.log("Chave: "+chave+" - Valor: "+valor);
	}

	//alert(localStorage.key(0)); // Retorna a chave do primeiro item da localStorage.

	if(localStorage.getItem("email")){
		let email = atob(localStorage.getItem("email")); //descriptografando
		$("#email").val(email);
	}
}
