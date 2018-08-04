<html>
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
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
    <h2>Auto Import Date : {{ $today }}</h2>

    <h2>Weekly : {{ $weekly ? $weekly->count() : 0 }}</h2>
    <h2>Monthly : {{ $monthly ? $monthly->count() : 0 }}</h2>
    <h2>Bi-Weekly : {{ $bi_weekly ? $bi_weekly->count() : 0 }}</h2>
    <h2>Quarterly : {{ $quarterly ? $quarterly->count() : 0 }}</h2>
    <h2>Total : {{ $total }}</h2>


    <table>
        <tr>
            <th>ID</th>
            <th>Publication Name</th>
            <th>Publication Date</th>
            <th>Issue</th>
            <th>Type</th>
        </tr>
        <tr>
            <td colspan="5"><strong>Monthly</strong></td>
        </tr>
        @if($monthly)
            @foreach($monthly as $count => $data)
                <tr>
                    <td>{{ $count++ + 1 }}</td>
                    <td>{{ $data->publication_name }}</td>
                    <td>{{ $data->download->publication_date }}</td>
                    <td>{{ $data->issue }}</td>
                    <td>{{ $data->publication_type }}</td>
                </tr>
            @endforeach
        @endif
        <tr>
            <td colspan="5"><strong>Weekly</strong></td>
        </tr>
        @if($weekly)
            @foreach($weekly as $count => $data)
                <tr>
                    <td>{{ $count++ + 1 }}</td>
                    <td>{{ $data->publication_name }}</td>
                    <td align="center">{{ $data->download->publication_date }}</td>
                    <td>{{ $data->issue }}</td>
                    <td>{{ $data->publication_type }}</td>
                </tr>
            @endforeach
        @endif
        <tr>
            <td colspan="5"><strong>Bi-Weekly</strong></td>
        </tr>
        @if($bi_weekly)
            @foreach($bi_weekly as $count => $data)
                <tr>
                    <td>{{ $count++ + 1 }}</td>
                    <td>{{ $data->publication_name }}</td>
                    <td>{{ $data->download->publication_date }}</td>
                    <td>{{ $data->issue }}</td>
                    <td>{{ $data->publication_type }}</td>
                </tr>
            @endforeach
        @endif
        <tr>
            <td colspan="5"><strong>Quarterly</strong></td>
        </tr>
        @if($quarterly)
            @foreach($quarterly as $count => $data)
                <tr>
                    <td>{{ $count++ + 1 }}</td>
                    <td>{{ $data->publication_name }}</td>
                    <td>{{ $data->download->publication_date }}</td>
                    <td>{{ $data->issue }}</td>
                    <td>{{ $data->publication_type }}</td>
                </tr>
            @endforeach
        @endif
    </table>

    <p>This is an auto generated email. Please do not reply.</p>

</body>
</html>
