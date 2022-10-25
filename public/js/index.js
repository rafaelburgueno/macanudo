




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