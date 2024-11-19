<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comidas Más Vendidas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <h2>Comidas Más Vendidas</h2>

    <table>
        <thead>
            <tr>
                <th>Comida</th>
                <th>Ventas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ventasAli as $alimento)
                <tr>
                    <td>{{ $alimento->alimennto_name }}</td>
                    <td>{{ $alimento->cant_vend }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>

</body>

</html>
