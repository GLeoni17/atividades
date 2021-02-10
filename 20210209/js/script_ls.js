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
			let email64 = btoa($("#email").val());
			let data = Date.now();
			let usuario = {"email":email64, "data":data};
			localStorage.setItem("usuario", JSON.stringify(usuario));
		}else{
			if(localStorage.getItem("usuario")){
				localStorage.removeItem("usuario");
			}
		}
	});

	getItemLocalStorage();
});

function getItemLocalStorage(){

	if(usuario = JSON.parse(localStorage.getItem("usuario"))){
		if(Date.now() - usuario.data < 20000){
			let email = atob(localStorage.getItem("email"));
			$("#email").val(email);
		}else{
			localStorage.removeItem("usuario");
		}
	}

	
}
