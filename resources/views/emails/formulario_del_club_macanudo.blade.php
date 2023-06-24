<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Se recibió una suscripción al club</title>
</head>
<body>
    <h2>{{$suscripcion->user->name}} se suscribió al Club Macanudo.</h2>    

    <p>Email: <strong>{{$suscripcion->user->email}}</strong></p>
    <p>Teléfono: <strong>{{$suscripcion['telefono']}}</strong></p>
    <p>Dirección: <strong>{{$suscripcion['direccion_de_entrega']}}</strong></p>
</body>
</html>