
$(document).ready(function(){




	$('.alerta-antes-de-eliminar').submit(function(e){
		e.preventDefault();

		Swal.fire({
			title: '¿Realmente quiere eliminar el elemento?',
			text: "Esta acción será irreversible.",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Sí, eliminar.',
			cancelButtonText: 'Cancelar.'
		}).then((result) => {
			if (result.isConfirmed) {
			/*Swal.fire(
				'Deleted!',
				'Your file has been deleted.',
				'success'
			);*/
				this.submit();
			}
		})

	});
	




	/*$('.btn-crear').submit(function(e){
		e.preventDefault();
		let timerInterval
		Swal.fire({
			title: 'Creando',
			html: 'Por favor espere.',
			//timer: 10000,
			timerProgressBar: true,
			didOpen: () => {
				Swal.showLoading()
				const b = Swal.getHtmlContainer().querySelector('b')
				timerInterval = setInterval(() => {
				b.textContent = Swal.getTimerLeft()
				}, 100)
			},
			willClose: () => {
				clearInterval(timerInterval)
			}
			}).then((result) => {
			// Read more about handling dismissals below 
			if (result.dismiss === Swal.DismissReason.timer) {
				console.log('I was closed by the timer')
			}
		})
	});*/



});


// TODO: en lapagina de canastas apareceun error en la linea 72 VVV 
// comente el codigo para solucionar el problema, el error ya no aparece,
// parece que el codigo funciona bien.
/*window.addEventListener('scroll', function()  {
    let element = document.getElementById('scroll-content');
    let screenSize = window.innerHeight;
    
	if (element) {
		if(element.getBoundingClientRect().top < screenSize) {
			element.classList.add('visible');
		} else {
			element.classList.remove('visible');
		}
	} else {
        console.log('El elemento "scroll-content" no se encontró');
    }
});*/

  
window.addEventListener('scroll', function()  {
    let elements = document.getElementsByClassName('scroll-content');
    let screenSize = window.innerHeight;
    
	for(var i = 0; i < elements.length; i++) {
		let element = elements[i];

		if(element.getBoundingClientRect().top < screenSize) {
			element.classList.add('visible');
		} else {
			element.classList.remove('visible');
		}
	}
});
  


var alertPlaceholder = document.getElementById('liveAlertPlaceholder')
var alertTrigger = document.getElementById('liveAlertBtn')

function alert(message, type) {
	var wrapper = document.createElement('div')
	wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'

	alertPlaceholder.append(wrapper)
}


if (alertTrigger) {
	alertTrigger.addEventListener('click', function () {
		alert('Nice, you triggered this alert message!', 'success')
	})
}





// ***************************************
// scripts para añadirproductos al carrito
// ***************************************
	//let ruta_al_carrito = "{{route('mi_carrito')}}";
    //console.log("el carrito esta en: " + ruta_al_carrito);

    function anadirEIeAlCarrito(id){
        anadirAlCarrito(id);
        alert("se agrego al carrito?");
        //location.replace("{{route('mi_carrito')}}");
		//location.replace("mi_carrito");
		// debe redireccionar a la pagina de carrito
		//window.location.href = "../mi_carrito";
    }

	function anadirAlCarrito(id){
		let mi_carrito = [];
		
		/*if ( localStorage.getItem("carrito") ){*/
		if( localStorage.getItem("cookies") || true ){
			mi_carrito.push(localStorage.getItem("carrito"));
		}/*else{
			mi_carrito.push("{{ Session::get('carrito'); }}");
		}*/

		mi_carrito.push(id);

		//si el primer elemento del array es null, lo elimina
		if( mi_carrito[0] == null ){
			mi_carrito.shift();
		}
		
		//if( localStorage.getItem("cookies") ){
			localStorage.setItem("carrito", mi_carrito);
		//}

		

		//console.log( typeof mi_carrito );
		console.log('carrito: ' + mi_carrito );

		/*for(let i = 0; i < mi_carrito.length; i++){
			console.log(mi_carrito[i]);
		}*/


		//ALERTA 
		const Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 4000,
		timerProgressBar: true,
		didOpen: (toast) => {
			toast.addEventListener('mouseenter', Swal.stopTimer)
			toast.addEventListener('mouseleave', Swal.resumeTimer)
		}
		})

		Toast.fire({
		icon: 'success',
		title: 'Se añadio al carrito'
		})

		actualizarContadorDelCarrito();

	}

// ***************************************
// Fin de scripts para añadir productos al carrito
// ***************************************




// ***************************************
// alertas relativasa las categorias
// ***************************************
// Alerta de categoria creada
Livewire.on('categoriaCreada', (nombreCategoria) => {
	
	//console.log('categoria creada con exitooo');
	const Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 4000,
		timerProgressBar: true,
		didOpen: (toast) => {
			toast.addEventListener('mouseenter', Swal.stopTimer)
			toast.addEventListener('mouseleave', Swal.resumeTimer)
		}
	})

	Toast.fire({
		icon: 'success',
		title: 'Categoria '+ nombreCategoria +' creada con exito.'
	})
	
})

// Alerta de categoria eliminada
Livewire.on('categoriaEliminada', (nombreCategoria) => {
	
	//console.log('categoria creada con exitooo');
	const Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 4000,
		timerProgressBar: true,
		didOpen: (toast) => {
			toast.addEventListener('mouseenter', Swal.stopTimer)
			toast.addEventListener('mouseleave', Swal.resumeTimer)
		}
	})

	Toast.fire({
		icon: 'success',
		title: 'Categoria '+ nombreCategoria +' eliminada con exito.'
	})
	
})

// Alerta de categoria vinculada o desvinculada
Livewire.on('vincularDesvincular', (mensaje) => {
	
	//console.log('categoria creada con exitooo');
	const Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 4000,
		timerProgressBar: true,
		didOpen: (toast) => {
			toast.addEventListener('mouseenter', Swal.stopTimer)
			toast.addEventListener('mouseleave', Swal.resumeTimer)
		}
	})

	Toast.fire({
		icon: 'success',
		title: mensaje 
	})
	
})



// ***************************************
// alertas relativasa los comentarios
// ***************************************
// Alerta de comentario creado
Livewire.on('comentarioCreado', () => {
	
	console.log('comentario creado con exitooo: ');
	const Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 4000,
		timerProgressBar: true,
		didOpen: (toast) => {
			toast.addEventListener('mouseenter', Swal.stopTimer)
			toast.addEventListener('mouseleave', Swal.resumeTimer)
		}
	})

	Toast.fire({
		icon: 'success',
		title: 'Comentario creado con exito. Se publicara despues de ser aprobado.'
	})
	
})


// Alerta de comentario actualizado
Livewire.on('comentarioActualizado', () => {
	
	console.log('comentario actualizado con exitooo: ');
	const Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 4000,
		timerProgressBar: true,
		didOpen: (toast) => {
			toast.addEventListener('mouseenter', Swal.stopTimer)
			toast.addEventListener('mouseleave', Swal.resumeTimer)
		}
	})

	Toast.fire({
		icon: 'success',
		title: 'Comentario actualizado con exito.'
	})
	
})