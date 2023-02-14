<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mensaje recibido desde el formulario de contacto</title>
</head>
<body>
    <h2>Mensaje de {{$mensaje['nombre']}} <small>({{$mensaje['email']}})</small> desde el formulario de contacto.</h2>    

    <p>{{$mensaje['texto']}}</p>

</body>
</html>