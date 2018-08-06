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
    <h2>Publications Import Date : {{ $today }}</h2>

    <h3>Weekly : {{ $weekly ? $weekly->count() : 0 }}</h3>
    <h3>Monthly : {{ $monthly ? $monthly->count() : 0 }}</h3>
    <h3>Bi-Weekly : {{ $bi_weekly ? $bi_weekly->count() : 0 }}</h3>
    <h3>Quarterly : {{ $quarterly ? $quarterly->count() : 0 }}</h3>
    <h2>Total : {{ $total }}</h2>

    <table>
        <tr bgcolor="#FF0000">
            <th>ID</th>
            <th>Publication Name</th>
            <th align="center">Publication Date</th>
            <th>Issue</th>
            <th>Type</th>
            <th>Batching</th>
        </tr>
        <tr>
            <td colspan="6"><strong>Monthly</strong></td>
        </tr>
        @if($monthly)
            @foreach($monthly as $count => $data)
                <tr>
                    <td>{{ $count++ + 1 }}</td>
                    <td>{{ $data->publication_name }}</td>
                    <td align="center">{{ $data->downloads->first()->publication_date }}</td>
                    <td>{{ $data->issue }}</td>
                    <td>{{ $data->publication_type }}</td>
                    <td>{!! batching_label($data->default_batch) !!}</td>
                </tr>
            @endforeach
        @endif
        <tr>
            <td colspan="6"><strong>Weekly</strong></td>
        </tr>
        @if($weekly)
            @foreach($weekly as $count => $data)
                <tr>
                    <td>{{ $count++ + 1 }}</td>
                    <td>{{ $data->publication_name }}</td>
                    <td align="center">{{ $data->downloads->first()->publication_date }}</td>
                    <td>{{ $data->issue }}</td>
                    <td>{{ $data->publication_type }}</td>
                    <td>{!! batching_label($data->default_batch) !!}</td>
                </tr>
            @endforeach
        @endif
        <tr>
            <td colspan="6"><strong>Bi-Weekly</strong></td>
        </tr>
        @if($bi_weekly)
            @foreach($bi_weekly as $count => $data)
                <tr>
                    <td>{{ $count++ + 1 }}</td>
                    <td>{{ $data->publication_name }}</td>
                    <td align="center">{{ $data->downloads->first()->publication_date }}</td>
                    <td>{{ $data->issue }}</td>
                    <td>{{ $data->publication_type }}</td>
                    <td>{!! batching_label($data->default_batch) !!}</td>
                </tr>
            @endforeach
        @endif
        <tr>
            <td colspan="6"><strong>Quarterly</strong></td>
        </tr>
        @if($quarterly)
            @foreach($quarterly as $count => $data)
                <tr>
                    <td>{{ $count++ + 1 }}</td>
                    <td>{{ $data->publication_name }}</td>
                    <td align="center">{{ $data->downloads->first()->publication_date }}</td>
                    <td>{{ $data->issue }}</td>
                    <td>{{ $data->publication_type }}</td>
                    <td>{!! batching_label($data->default_batch) !!}</td>
                </tr>
            @endforeach
        @endif
    </table>

    <p>This is an auto generated email. Please do not reply.</p>

</body>
</html>
