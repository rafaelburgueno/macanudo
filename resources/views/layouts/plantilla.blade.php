<!DOCTYPE html>
<html lang="en">
<head>

    <!--<meta charset="UTF-8">-->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Macanudo - @yield('title')</title>
    <meta name="description" content="@yield('meta-description', 'metadescripción por defecto')">

    {{--<link rel="icon" href="{{ asset('/storage/img/castana.t.png') }}">--}}

    <!-- CSS BOOTSTRAP 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- CSS BOOTSTRAP 5 -->
    {{--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">--}}
    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- ESTILOS DE LOS ICONOS DE BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">


    <!-- Estilos de liwire -->
    @livewireStyles

    <!--Popper-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!--Jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- JS BOOTSTRAP 4 -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- JS BOOTSTRAP 5 -->
    {{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>--}}

    

    

    <!-- Sweet alert 2-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    @if(request()->routeIs('posts.*'))
        <!-- Summernote -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
        <!--<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>-->
        <script src="{{ asset('/js/summernote.js')}}"></script>
        <!--summernote local-->
        <!--summernote local-->
        {{--<script src="{{ asset('/js/summernote.js')}}"></script>--}}
    @endif



    <!-- ESTILOS CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/index.css')}}">

<!-- GOOGLE ANALITICS -->
    <!-- Google tag (gtag.js) Sofía-->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-9WD6T7QFEF"></script>
    <script>
        function ejecutarGTM(){
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            
            gtag('config', 'G-9WD6T7QFEF');
            
            console.log("se ejecuto el codigo GTM");
        }
    </script>
    
<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1169074470952590');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1169074470952590&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->
    
    <!-- Google tag (gtag.js) Gabriel-->
    {{--<script async src="https://www.googletagmanager.com/gtag/js?id=AW-620792546"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'AW-620792546');
    </script>--}}
    
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MSDRGN8C');</script>
<!-- End Google Tag Manager -->

<!-- Google tag (gtag.js) event - delayed navigation helper -->
<script>
  // Helper function to delay opening a URL until a gtag event is sent.
  // Call it in response to an action that should navigate to a URL.
  function gtagSendEvent(url) {
    var callback = function () {
      if (typeof url === 'string') {
        window.location = url;
      }
    };
    gtag('event', 'ads_conversion_Suscripci_n_Carga_de_la_1', {
      'event_callback': callback,
      'event_timeout': 2000,
      // <event_parameters>
    });
    return false;
  }
</script>

</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MSDRGN8C"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


    <script> 
        // alerta para aceptar las cookies
        console.log("se revisa el estado de las cookies");
        
        if( localStorage.getItem("cookies") == null ){
            console.log("Se ejecuta la alerta para aceptar las cookies");
            // si la variable cookies no esta definida se le pide al usuario que acepte las cookies mediante un sweetalert

            Swal.fire({
                /*title: 'Utilizamos cookies',*/
                /*text: "Macanudo utiliza cookies de terceros para mejorar la experiencia del usuario. Al continuar navegando aceptas su uso y nuestra <a href='https://www.google.com'>política de cookies</a>",*/
                /*html: 'Macanudo se compromete a proteger la privacidad de los usuarios que visitan el sitio web. Al continuar navegando aceptas nuestra <a role="button" href="#" data-toggle="modal" data-target="#politicas_de_privacidad">política de cookies</a>.',*/
                html: 'Al hacer clic en “Aceptar las cookies”, usted acepta que las cookies se guarden en su dispositivo para mejorar la navegación del sitio, analizar el uso del mismo, y colaborar con nuestros estudios para marketing. Puede leer nuestra <a role="button" href="#" data-toggle="modal" data-target="#politicas_de_privacidad">política de cookies</a> para más información.',
                container: {
                    zIndex: 10000
                },
                /*icon: 'warning',*/
                showCancelButton: true,
                confirmButtonColor: '#4554a4',
                cancelButtonColor: '#f04643',
                confirmButtonText: 'Aceptar las cookies',
                cancelButtonText: 'Cancelar',
                position: 'bottom',
                width: '100%',
                
            }).then((result) => {
                if (result.isConfirmed) {
                    localStorage.setItem("cookies", "aceptadas");
                    ejecutarGTM();
                }else if(result.isDismissed){
                    localStorage.setItem("cookies", "no aceptadas");
                }
            });
            
            console.log("el estado de las cookies es: " + localStorage.getItem("cookies") );
        }


        //si las cookies fueron aceptadas se ejecuta el codigo GTM
        if( localStorage.getItem("cookies") == "aceptadas" ){
            ejecutarGTM();
        }
    



    </script>


    <!-- Header -->
    @include('partials.nav')

    <!-- mensajes de alerta -->
    @include('partials.alertas')
 
 
    <!-- contenido -->
    @yield('content')
     
 
 
    <!-- Footer -->
    @include('partials.footer')


    {{--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
--}}

    <!-- JS livewire -->
    @livewireScripts
    
    <!-- Nuestro javascript -->
    <script src="{{ asset('/js/index.js')}}"></script>
    
    @yield('scripts')


</body>
</html>