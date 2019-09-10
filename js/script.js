$(document).ready(function(){

	$("#menubar li").hover(function(){
		$(this).children(":hidden").slideDown();
	},function(){
		$(this).parent().find("ul").slideUp();

	});


	$("#buttonadmin").click(function(){
		$('#adminlogin').slideToggle();

	});
	$("#buttonteacher").click(function(){
		$('#teacherlogin').slideToggle();

	});



	$("#click_admin").click(function(){
		$('#adminlogin').slideToggle();

	});

	$("#click_teacher").click(function(){
		$('#teacherlogin').slideToggle();

	$});

});
function cancelar() {
	history.go(-1);
}
function masMonedas( id, monedas){
		$.post("insertar_monedas.php",{ id : id, monedas : monedas}, function( data, status ) {
			window.location.reload();
			 // if(status.success == true){ // if true (1)
				//  window.location.reload();
			 // }
		  //      setTimeout(function(){// wait for 5 secs(2)
		  //           location.reload(); // then reload the page.(3)
		  //      }, 5000);
		  //   }
		});
}

function eliminarRol() {
	location.href = 'eliminar_rol.php?r='+rol;
}

function nuevoComportamiento() {
	location.href = 'nuevo.php';
}
function editarComportamiento(id){
	console.log('Editar Comportamiento: ' + id);
	location.href = 'editar.php?id='+id;
}

function eliminarComportamiento(id) {
	location.href = 'eliminar.php?id='+id;
}

function eliminarRecompensa(id) {
	$.post("eliminar.php",{ id : id}, function( data, status ) {
		window.location.reload();
		//$('#errores').html('error');
	});
}
function editarRecompensa(id){
	console.log('editarRecompensa : ' + id);
	location.href = 'editar.php?id='+id;
}

function asignar(alumno) {

	document.getElementById('idusuario').value=alumno;

	//$('#exampleModal').val($('#idOfDialogElement').val());
	//$('#exampleModal').val($('#idusuario').val(alumno));
	//location.href = '../comportamientos/comp_alum.php?comp='+comp+'&alumno='+alumno;
	//alert(alumno);
}

function test(comportamiento, usuario) {
	alert('Asignar ' + comportamiento + ' a ' + usuario);
}
