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
    <h1>Status as of {{ \Carbon\Carbon::now() }}</h1>
    <h2>For Download : {{ $downloads->where('status','For Download')->count() }}</h2>
    <h2>Not Updated : {{ $downloads->where('status','Not Updated')->count() }}</h2>
    <h2>For Query : {{ $downloads->where('status','For Query')->count() }}</h2>
    <h2>Pending : {{ $downloads->where('status','Pending')->count() }}</h2>
    <h2>Total : {{ $downloads->count() }}</h2>

    <table>
        <tr bgcolor="#FF0000">
            <th>ID</th>
            <th>Publication Name</th>
            <th align="center">Publication Date</th>
            <th>Status</th>
            <th>Remarks</th>
            <th>Last Checked By</th>
        </tr>
        @if($downloads)
            @foreach($downloads as $count => $download)
                <tr>
                    <td>{{ $count++ + 1 }}</td>
                    <td>{{ $download->publication->publication_name }}</td>
                    <td align="center">{{ $download->publication_date }}</td>
                    <td>{{ $download->status }}</td>
                    <td>{{ $download->remarks }}</td>
                    <td>{{ $download->checked_by == 0 ? '' : $download->operator->operator_no }}</td>
                </tr>
            @endforeach
        @endif
        <tr bgcolor="#FF0000">
            <th colspan="6">No Record</th>
        </tr>
        @if($no_records)
            @foreach($no_records as $count => $no_re)
                @if($no_re->download->publication->publication_type == 'Inactive')
                <tr>
                    <td>{{ $count++ + 1 }}</td>
                    <td>{{ $no_re->download->publication->publication_name }}</td>
                    <td align="center">{{ $no_re->download->publication_date }}</td>
                    <td>{{ $no_re->download->status }}</td>
                    <td>{{ $no_re->download->remarks }}</td>
                    <td></td>
                </tr>
                @endif
            @endforeach
        @endif

    </table>

    <p>This is an auto generated email. Please do not reply.</p>

</body>
</html>
