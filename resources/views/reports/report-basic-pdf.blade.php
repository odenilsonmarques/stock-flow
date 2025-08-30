<!DOCTYPE html>
<html>
<head>
    <title>Relatório de Produtos</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        h3 { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #f2f2f2; }
        .text-success { color: green; font-weight: bold; }
        .text-danger { color: red; font-weight: bold; }
        .fw-bold { font-weight: bold; }
    </style>
</head>
<body>
    <h3>Relatório de Produtos</h3>
    <p>Período: {{ \Carbon\Carbon::parse($startDate)->format('d/m/Y') }} até {{ \Carbon\Carbon::parse($endDate)->format('d/m/Y') }}</p>
    <table>
        <thead>
            <tr>
                <th>Produto</th>
                <th>Entradas</th>
                <th>Saídas</th>
                <th>Saldo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($report as $row)
                <tr>
                    <td>{{ $row->name }}</td>
                    <td class="text-success">{{ $row->total_inputs }}</td>
                    <td class="text-danger">{{ $row->total_outputs }}</td>
                    <td class="fw-bold">{{ $row->saldo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
