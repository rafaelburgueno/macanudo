
@if(session('exito'))
    {{--<div class="container position-fixed mt-2 alerta">
        <div class="float-right">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Exito! </strong> {{session('exito')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>--}}

    <script>
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
        title: '{{session('exito')}}'
        })
    </script>

@endif

@if(session('no_permitido'))
    {{--<div class="container position-fixed mt-2 alerta">
        <div class="float-right">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>No Permitido! </strong> {{session('no_permitido')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>--}}

    <script>
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
        icon: 'warning',
        title: '{{session('no_permitido')}}'
        })
    </script>

@endif


@if(session('error'))

    <script>
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
        icon: 'warning',
        title: '{{session('error')}}'
        })
    </script>

@endif


@if(session('pagar_al_recibir'))

    <script>
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
        title: '{{session('pagar_al_recibir')}}'
        })

        /*TODO hay que borrar los elementos del carrito*/
        localStorage.removeItem("carrito");
        actualizarContadorDelCarrito();
        /* # */

    </script>

@endif


@if(session('pago_aprovado'))

    <script>
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
        title: '{{session('pago_aprovado')}}'
        })

        /*TODO hay que borrar los elementos del carrito*/
        localStorage.removeItem("carrito");
        actualizarContadorDelCarrito();
        /* # */

    </script>

@endif


{{--<script>
$(document).ready(function(){
    $(".alerta").fadeOut(15000);
});
</script>--}}