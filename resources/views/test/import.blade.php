


<table>
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
</table>