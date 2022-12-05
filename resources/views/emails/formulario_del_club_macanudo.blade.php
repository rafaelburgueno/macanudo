<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mensaje recibido desde el formulario del club macanudo contacto</title>
</head>
<body>
    <h2>{{$mensaje['nombre']}} hizo una solicitud para inscribirse al Club Macanudo.</h2>    

    <p>Email: <strong>{{$mensaje['email']}}</strong></p>
    <p>Teléfono: <strong>{{$mensaje['telefono']}}</strong></p>
    <p>Dirección: <strong>{{$mensaje['direccion']}}</strong></p>
</body>
</html>