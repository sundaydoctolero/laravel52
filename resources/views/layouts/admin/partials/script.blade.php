
<!-- jQuery 3 -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('bower_components/admin-lte/dist/js/adminlte.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>

<script>
    $(document).ready(function(){
        $('#role_list').select2();

        $('#permission_list').select2();

        $(".btn-danger").click(function(){
            //confirm("Are you sure you want to delete?");
          //  $(".modal").modal();
           // return false;
        });

        $(".btn-warning").click(function(){
            //confirm("Are you sure you want to reset the password?");
            //  $(".modal").modal();
            // return false;
        });

    })
</script>