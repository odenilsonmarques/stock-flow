<!DOCTYPE html>
<html>

<head>
    <title>Relatório de Produtos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        h3 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .text-success {
            color: green;
            font-weight: bold;
        }

        .text-danger {
            color: red;
            font-weight: bold;
        }

        .fw-bold {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h3>Relatório de Produtos Detalhado</h3>
    <p>Período: {{ \Carbon\Carbon::createFromFormat('d/m/Y', $startDate)->format('d/m/Y') }} até
        {{ \Carbon\Carbon::createFromFormat('d/m/Y', $endDate)->format('d/m/Y') }}</p>


    <table>
        <thead>
            <tr>
                <th>Data</th>
                <th>Produto</th>
                <th>Tipo</th>
                <th>Quantidade</th>
                <th>Fornecedor/Destino</th>
                <th>Responsável</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movements as $row)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($row->date)->format('d/m/Y H:i') }}</td>
                    <td>{{ $row->product_name }}</td>
                    <td>
                        <span class="badge {{ $row->type == 'entrada' ? 'bg-success' : 'bg-danger' }}">
                            {{ ucfirst($row->type) }}
                        </span>
                    </td>
                    <td class="fw-bold">{{ $row->quantity }}</td>
                    <td>
                        @if ($row->type == 'entrada')
                            {{ $row->supplier_name ?? '-' }}
                        @else
                            {{ $row->destiny ?? '-' }}
                        @endif
                    </td>
                    <td>{{ $row->user_name ?? 'Sistema' }}</td>
                </tr>
            @endforeach


        </tbody>
    </table>
</body>

</html>
