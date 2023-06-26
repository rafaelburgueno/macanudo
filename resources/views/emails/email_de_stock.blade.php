<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email de Stock</title>
    <style>
        table {
          border-collapse: collapse;
        }
        table, th, td {
          border: 1px solid black;
        }
        th, td {
          padding: 5px;
        }
      </style>
      
</head>
<body>
    
    <p>{{$data}}</p>

    <hr>

    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Stock</th>
                <th>Activo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td>{{$producto->nombre}}</td>
                    <td>{{$producto->stock}}</td>
                    <td>
                        @if ($producto->activo)
                            Si
                        @else
                            No
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    
</body>
</html>