    {{ csrf_field() }}

    <div class = "container" >
        <tt>
            <font face = "microsoft sans serif">
                <div class="row">
                    <div class="form-group">

                        <div class = "col-md-6">
                            {!! Form::label('publication_id', 'Publication Name :') !!}
                            {!! Form::select('publication_id',$publication_lists,null,['class'=>'form-control','required'=>'true','disabled'=>'true']) !!}
                        </div>

                        <div class = "col-md-2">
                            {!! Form::label('publication_date', 'Publication Date :') !!}
                            {!! Form::date('publication_date',null,['class'=>'form-control','required'=>'true','disabled'=>'true']) !!}
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2">
                            {!! Form::label('dop_on_website', 'Pub Date on Web') !!}
                            {!! Form::date('dop_on_website',null,['class'=>'form-control']) !!}
                        </div>

                        <div class="col-md-2">
                            {!! Form::label('website_update_at', 'Download Date') !!}
                            {!! Form::date('website_update_at',null,['class'=>'form-control']) !!}
                        </div>

                        <div class="col-md-2 col-md-offset-2">
                            {!! Form::label('status', 'Status') !!}
                            {!! Form::select('status',$status_lists,null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2">
                            {!! Form::label('re_pages', 'RE Pages') !!}
                            {!! Form::text('re_pages',null,['class'=>'form-control']) !!}
                        </div>

                        <div class="col-md-2">
                            {!! Form::label('paper_pages', 'Paper Pages') !!}
                            {!! Form::text('paper_pages',null,['class'=>'form-control']) !!}
                        </div>

                        <div class="col-md-2">
                            {!! Form::label('glossy_pages', 'Glossy Pages') !!}
                            {!! Form::text('glossy_pages',null,['class'=>'form-control']) !!}
                        </div>

                        <div class="col-md-2">
                            {!! Form::label('classifieds_pages', 'Classifieds Pages') !!}
                            {!! Form::text('classifieds_pages',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class="col-md-8">
                            {!! Form::label('remarks', 'Remarks') !!}
                            {!! Form::text('remarks',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2">
                            {!! Form::label('no_of_batches', 'Batching') !!}
                            {!! Form::select('no_of_batches',['0'=>'Pending','1'=>'Auto','2'=>'Manual'],null,['class'=>'form-control','required'=>'true']) !!}
                        </div>

                        <div class="col-md-6">
                            {!! Form::label('operator_list', 'Assigned Operators') !!}
                            {!! Form::select('operator_list[]', \App\User::lists('operator_no','id'), null, ['class'=>'form-control','id'=>'operator_list','multiple'=>'true']) !!}
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="form-group">
                        <div class="col-md-5">
                            {!! Form::submit($buttonlabel,['class'=>'col-md-1 btn btn-success form-control ']) !!}
                        </div>
                        <div class="col-md-5">
                            <a href="{{ redirect()->getUrlGenerator()->previous() }}" class="form-control btn btn-primary">Cancel</a>
                        </div>
                    </div>
                </div>
            </font>
        </tt>
    </div>
    </div>

    @include('errors.error')

