    {{ csrf_field() }}

    <div class = "container" >
        <tt>
            <font face = "microsoft sans serif">
                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">
                            {!! Form::label('publication_id', 'Publication Name :') !!}
                            {!! Form::select('publication_id',$publication_lists,null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-3 col-md-offset-3">
                            {!! Form::label('publication_date', 'Publication Date :') !!}
                            {!! Form::date('publication_date',null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>
            </font>
        </tt>
    </div>
    <br>


    <div id="hide-form">
        <div class="form-group">
            <div class="row">
                {!! Form::label('dop_on_website', 'Pub Date on Web',['class'=>'col-md-1 control-label col-md-offset-1']) !!}
                <div class="col-md-2">
                    {!! Form::date('dop_on_website',null,['class'=>'form-control']) !!}
                </div>
                {!! Form::label('website_update_at', 'Download Date',['class'=>'col-md-1 control-label']) !!}
                <div class="col-md-3">
                    {!! Form::date('website_update_at',null,['class'=>'form-control']) !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                {!! Form::label('re_pages', 'RE Pages',['class'=>'col-md-1 control-label col-md-offset-1']) !!}
                <div class="col-md-1">
                    {!! Form::text('re_pages',null,['class'=>'form-control']) !!}
                </div>
                {!! Form::label('paper_pages', 'Paper Pages',['class'=>'col-md-1 control-label col-md-offset-1']) !!}
                <div class="col-md-1">
                    {!! Form::text('paper_pages',null,['class'=>'form-control']) !!}
                </div>
                {!! Form::label('status', 'Status',['class'=>'col-md-1 control-label col-md-offset-1']) !!}
                <div class="col-md-3">
                    {!! Form::select('status',$status_lists,null,['class'=>'form-control','required'=>'true']) !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                {!! Form::label('glossy_pages', 'Glossy Pages',['class'=>'col-md-1 control-label col-md-offset-1']) !!}
                <div class="col-md-1">
                    {!! Form::text('glossy_pages',null,['class'=>'form-control']) !!}
                </div>
                {!! Form::label('classifieds_pages', 'Classifieds Pages',['class'=>'col-md-1 control-label col-md-offset-1']) !!}
                <div class="col-md-1">
                    {!! Form::text('classifieds_pages',null,['class'=>'form-control']) !!}
                </div>
                {!! Form::label('remarks', 'Remarks',['class'=>'col-md-1 control-label col-md-offset-1']) !!}
                <div class="col-md-3">
                    {!! Form::text('remarks',null,['class'=>'form-control']) !!}
                </div>
            </div>
        </div>

    </div> <!-- hidden form -->

    <div class="form-group">
        <div class="row">
            {!! Form::label('no_of_batches', 'Batching',['class'=>'col-md-1 control-label col-md-offset-1']) !!}
            <div class = "col-md-2">
                {!! Form::select('no_of_batches',['0'=>'Pending','1'=>'Auto','2'=>'Manual'],null,['class'=>'form-control','required'=>'true']) !!}
            </div>

            {!! Form::label('operator_list', 'Operators',['class'=>'col-md-1 control-label']) !!}
            <div class="col-md-4">
                {!! Form::select('operator_list[]', \App\User::lists('operator_no','id'), null, ['class'=>'form-control','id'=>'operator_list','multiple'=>'true']) !!}
            </div>
        </div>
    </div>

    <hr>
    <div class="form-group">
        <div class="row">
            <div class="col-md-5 col-md-offset-1">
                {!! Form::submit($buttonlabel,['class'=>'col-md-1 btn btn-success form-control ']) !!}
            </div>
            <div class="col-md-5">
                <a href="{{ redirect()->getUrlGenerator()->previous() }}" class="form-control btn btn-primary">Cancel</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    </div>

    @include('errors.error')

