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
                        <div class = "col-md-3">
                            {!! Form::label('no_of_batches', 'Batches') !!}
                            {!! Form::select('no_of_batches',['1'=>'Auto','2'=>'Manual','0'=>'Pending'],null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            {!! Form::label('status', 'Status') !!}
                            {!! Form::select('status',['For Download'=>'For Download','For Entry'=>'For Entry'],null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">
                            {!! Form::label('operator_list', 'Operators') !!}
                            {!! Form::select('operator_list[]', \App\User::lists('operator_no','id'), null, ['class'=>'form-control','id'=>'operator_list','multiple'=>'true']) !!}
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
                {!! Form::label('dop_on_website', 'Publication Date on Web',['class'=>'col-md-2 control-label col-md-offset-1']) !!}
                <div class="col-md-3">
                    {!! Form::date('dop_on_website',null,['class'=>'form-control']) !!}
                </div>
                {!! Form::label('website_update_at', 'Website Updated',['class'=>'col-md-1 control-label col-md-offset-1']) !!}
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

    <hr>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    {!! Form::submit($buttonlabel,['class'=>'col-md-1 btn btn-primary form-control ']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
</div>



    @include('errors.error')

