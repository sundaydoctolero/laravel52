
    @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">�</button>
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
            {{ $error }}
        </div>
    @endforeach
