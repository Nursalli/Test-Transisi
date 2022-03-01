<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
    <h2>Employees of {{ $data[0]->company->nama }}</h2>
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
        </tr>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data[$loop->index]->nama }}</td>
                <td>{{ $data[$loop->index]->email }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
