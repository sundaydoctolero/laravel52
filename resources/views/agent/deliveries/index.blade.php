@extends('layouts.app.app',['page_header' => 'Outputs'])

@section('main-content')
    <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                {!! Form::open(['url' => '/agent/deliveries','class' => 'form-inline', 'method' => 'GET']) !!}
                <div class="form-group">
                    <h3 class="box-title"><i class="fa fa-arrow-up"></i><b> Deliveries</b> </h3>
                </div>
                <div class="pull-right">
                    <div class="form-group">
                        {!! Form::label('date_from', 'Date :') !!}
                        {!! Form::date('date_from',\Carbon\Carbon::now(),['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('delivery_time', 'Folder :') !!}
                        {!! Form::select('delivery_time', \App\Output::where('output_date',request('date_from'))->groupBy('delivery_time')->lists('delivery_time','delivery_time'),null,['class'=>'form-control','placeholder'=>'--']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Filter Delivery',['class'=>'btn btn-primary']) !!}
                    </div>
                    <div class="form-group">
                        <h1 class="box-title">

                        </h1>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <th>#</th>
                        <th>State</th>
                        <th>Publication Name</th>
                        <th class="text-center">Publication Date</th>
                        <th class="text-center">Status</th>
                        <th class="text-right">Sale</th>
                        <th class="text-right">Rent</th>
                        <th class="text-center">Sequence From</th>
                        <th class="text-center">Sequence To</th>
                        <th class="text-center">Output Date</th>
                        <th>Folder</th>
                        <th>Remarks</th>
                    </tr>
                    @foreach($outputs as $count => $output)
                            <tr>
                                <td>{{ $count + 1 }}</td>
                                <td>{{ $output->state }}</td>
                                <td>{{ $output->download->publication->publication_name }}</td>
                                <td class="text-center">{{ $output->download->publication_date }}</td>
                                <td class="text-center">{{ $output->download->status }}</td>
                                <td class="text-center">{{ $output->sale_records }}</td>
                                <td class="text-center">{{ $output->rent_records }}</td>
                                <td class="text-center">{{ $output->sequence_from }}</td>
                                <td class="text-center">{{ $output->sequence_to }}</td>
                                <td class="text-center">{{ $output->output_date }}</td>
                                <td class="text-center">{{ $output->delivery_time }}</td>
                                <td>{{ $output->remarks }}</td>
                            </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        @if($outputs->count() > 0)
                            <tr>
                                <td colspan="12">
                                    <a href="/export/generate_pub_details?date_from={{request('date_from')}}&delivery_time={{request('delivery_time')}}" class="btn-block btn btn-warning"><i class="fa fa-download"></i> Download Publication Details</a>
                                </td>
                            </tr>
                        @endif
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    </div>
@endsection

@push('scripts')
    <script>
        $("input[name='date_from']").on('change', function() {
            this.form.submit();
        });

    </script>
@endpush