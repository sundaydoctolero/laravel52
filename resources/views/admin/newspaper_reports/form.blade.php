    {{ csrf_field() }}

    <div class="form-group">
        <div class="row">
            {!! Form::label('publication_id', 'Publication Name',['class'=>'col-md-2 control-label col-md-offset-1']) !!}
            <div class="col-md-3">
                {!! Form::select('publication_id',$publication_lists,null,['class'=>'form-control','required'=>'true']) !!}
            </div>
            {!! Form::label('publication_date', 'Publication Date',['class'=>'col-md-1 control-label col-md-offset-1']) !!}
            <div class="col-md-3">
                {!! Form::date('publication_date',null,['class'=>'form-control','required'=>'true']) !!}
            </div>
        </div>
    </div>

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

    <hr>
    <div class="form-group">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                {!! Form::submit($buttonlabel,['class'=>'col-md-1 btn btn-primary form-control ']) !!}
            </div>
                {!! Form::close() !!}
        </div>
    </div>


    @include('errors.error')

