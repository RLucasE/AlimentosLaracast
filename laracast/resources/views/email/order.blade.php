@php
    $total = 0;
@endphp

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibo de Pago</title>
    <style>
        /* Incluir Tailwind CSS desde CDN */
        @import url('https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css');
    </style>
</head>

<body class="bg-gray-100 py-8">

    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Recibo de Pago</h1>
                <p class="text-gray-600">Fecha: 18 de noviembre de 2024</p>
            </div>
            <div class="text-right">
                <p class="font-semibold text-gray-700">Recibo #{{ $order->id }}</p>
                <p class="text-gray-600">Nmro Cliente: {{ $order->comp_num }}</p>
            </div>
        </div>

        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-800">Detalles de la Transacción</h2>
            <table class="min-w-full mt-4">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b text-left text-gray-600">Descripción</th>
                        <th class="px-4 py-2 border-b text-left text-gray-600">Cantidad</th>
                        <th class="px-4 py-2 border-b text-left text-gray-600">Precio Unitario</th>
                        <th class="px-4 py-2 border-b text-left text-gray-600">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orderDetails as $orderDetail)
                        @php
                            $total = $total + $orderDetail->cant * $orderDetail->price;
                        @endphp
                        <tr>
                            <td class="px-4 py-2 border-b">{{ $orderDetail->offerT->alimento->name }}</td>
                            <td class="px-4 py-2 border-b">{{ $orderDetail->cant }}</td>
                            <td class="px-4 py-2 border-b">{{ $orderDetail->price }}</td>
                            <td class="px-4 py-2 border-b">{{ $orderDetail->cant * $orderDetail->price }}</td>
                        </tr>
                    @endforeach

                    <tr>
                        <td class="px-4 py-2 border-b font-semibold">Total pagado</td>
                        <td class="px-4 py-2 border-b"></td>
                        <td class="px-4 py-2 border-b"></td>
                        <td class="px-4 py-2 border-b font-semibold">{{ $total }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            <p class="text-gray-700">Gracias por su compra.</p>
            <p class="text-gray-500">Correo: lucascabjnmro2@gmail.com</p>
        </div>
    </div>

</body>

</html>
