$(document).ready(function() {
	
	$("#storeBtn").click(function() {
		if($.trim($("#name").val()) == ""){
			$("#modalMessages").html("<div class='alert alert-warning alert-dismissable'><strong>Alerta!</strong> El nombre es requerido.<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>");
			return false;
		}
		if($.trim($("#phone").val()) == ""){
			$("#modalMessages").html("<div class='alert alert-warning alert-dismissable'><strong>Alerta!</strong> El tel\u00E9fono es requerido.<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>");
			return false;
		}
		if($.trim($("#email").val()) == ""){
			$("#modalMessages").html("<div class='alert alert-warning alert-dismissable'><strong>Alerta!</strong> El correo electronico es requerido.<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>");
			return false;
		}
		$("#storeForm").submit();
	});
	
	function getUrlParameter(sParam) {
		var sPageURL = decodeURIComponent(window.location.search.substring(1)),
			sURLVariables = sPageURL.split('&'),
			sParameterName,
			i;

		for (i = 0; i < sURLVariables.length; i++) {
			sParameterName = sURLVariables[i].split('=');

			if (sParameterName[0] === sParam) {
				return sParameterName[1] === undefined ? "" : sParameterName[1];
			}
		}
	};
	
	if(getUrlParameter("success") == "true"){
		$("#mainMessages").html("<div class='alert alert-success alert-dismissable'><strong>\u00C9xito!</strong> Su usuario ha sido almacenado.<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>");
		return false;
	} else if(getUrlParameter("success") == "false"){
		$("#mainMessages").html("<div class='alert alert-danger alert-dismissable'><strong>Error!</strong> Ocurrio un error almacenando su usuario.<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>");
	}
	
	if(getUrlParameter("delete") == "true"){
		$("#mainMessages").html("<div class='alert alert-success alert-dismissable'><strong>\u00C9xito!</strong> Su usuario ha sido eliminado.<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>");
		return false;
	} else if(getUrlParameter("delete") == "false"){
		$("#mainMessages").html("<div class='alert alert-danger alert-dismissable'><strong>Error!</strong> Ocurrio un error eliminando \u00E9l usuario.<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>");
	}
} );

	
function clearForm() {
	$("#userId").val("");
	$("#name").val("");
	$("#phone").val("");
	$("#email").val("");
};

function loadEdit(userId,name,phone,email) {
	$("#userId").val(userId);
	$("#name").val(name);
	$("#phone").val(phone);
	$("#email").val(email);
};