
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



	

	
	
	
});







window.addEventListener('scroll', function()  {
    let element = document.getElementById('scroll-content');
    let screenSize = window.innerHeight;
    
	if(element.getBoundingClientRect().top < screenSize) {
		element.classList.add('visible');
	} else {
		element.classList.remove('visible');
	}
});

  
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


