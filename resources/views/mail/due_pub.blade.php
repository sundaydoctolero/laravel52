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

    Test Mail Only

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
                @if($download->publication->publication_type == 'Inactive')

                @else
                <tr>
                    <td>{{ $count++ + 1 }}</td>
                    <td>{{ $download->publication->publication_name }}</td>
                    <td align="center">{{ $download->publication_date }}</td>
                    <td>{{ $download->status }}</td>
                    <td>{{ $download->remarks }}</td>
                    <td>{{ $download->checked_by == 0 ? '' : $download->operator->operator_no }}</td>
                </tr>
                @endif
            @endforeach
        @endif
    </table>

    <p>This is an auto generated email. Please do not reply.</p>

</body>
</html>
