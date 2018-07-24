    {{ csrf_field() }}

<div class="container">
    <div class="row">
        <div class="form-group">
            <div class = "col-md-4 col-xm-1 col-md-offset-1">
                {!! Form::label('publication_id', 'Publication Name :') !!}
                {!! Form::select('publication_id',$publication_lists,null,['class'=>'form-control','required'=>'true']) !!}
            </div>
            <div class = "col-md-3 col-xm-1">
                {!! Form::label('publication_date', 'Publication Date :') !!}
                {!! Form::date('publication_date',null,['class'=>'form-control','required'=>'true']) !!}
            </div>
            <div class = "col-md-3 col-xm-1">
                {!! Form::label('no_of_batches', 'Batches :') !!}
                {!! Form::text('no_of_batches',null,['class'=>'form-control','required'=>'true']) !!}
            </div>
        </div>
    </div>


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

        <div class="row">
            <div class="form-group">
                <div class = "col-md-6 col-md-offset-3">
                    {!! Form::label('permission', 'Operators') !!}
                    {!! Form::select('operator_list[]', $operator_lists, null, ['class'=>'form-control','id'=>'operator_list','multiple'=>'true']) !!}
                </div>
            </div>
        </div>

        <hr>
        <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                    {!! Form::select('status',$status_lists,null,['class'=>'form-control','required'=>'true']) !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    {!! Form::submit($buttonlabel,['class'=>'col-md-1 btn btn-primary form-control ']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
</div>



    @include('errors.error')

