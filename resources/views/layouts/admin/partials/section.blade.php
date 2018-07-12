<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="{{ $logo or 'fa fa-link'}} or {{ $icon or 'material-icons' }}"><small>{{ $optional or null }}</small>
        <font face = "microsoft sans serif"><b>
        {{ $page_header or 'No Page Header' }}
       <small>{{ $optional or null }}</small>
            </b></font>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol>
</section>