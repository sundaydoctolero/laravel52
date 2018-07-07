<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
    <ul class="nav navbar-nav">
        <li class='{{ setActive('/')}}'> <a href="/"><i class="fa fa-home"></i> Home</a></li>
        <li class='{{ setActive('agent/tasks') }}'><a href="/agent/tasks"><i class="fa fa-flag-o"></i> Task </a></li>
        <li class='{{ setACtive('myprofile*') }}'><a href="/myprofile/{{ auth()->user()->id }}/edit"><i class="fa fa-user"></i> Profile </a></li>
    </ul>
</div>
<!-- /.navbar-collapse -->