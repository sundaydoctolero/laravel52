<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
    <ul class="nav navbar-nav">
        <li class='{{ setActive('/')}}'> <a href="/"><i class="fa fa-home"></i> Home</a></li>
        <li class='{{ setActive('myprofile*') }}'><a href="/myprofile/{{ auth()->user()->id }}/edit"><i class="fa fa-user"></i> Profile </a></li>
        <li class='{{ setActive('agent/tsheets')}}'><a href="/agent/tsheets"><i class="fa fa-check"></i> Tsheet </a></li>
        <li class='{{ setActive('agent/downloads')}}'><a href="/agent/downloads"><i class="fa fa-arrow-down"></i> Download </a></li>
        <li class='{{ setActive('agent/entries')}}'><a href="/agent/entries"><i class="fa fa-arrow-down"></i> Entry </a></li>
        <li class='{{ setActive('agent/outputs')}}'><a href="/agent/outputs"><i class="fa fa-arrow-up"></i> Output </a></li>
        <li class='{{ setActive('agent/deliveries')}}'><a href="/agent/deliveries"><i class="fa fa-arrow-up"></i> Delivered </a></li>
        <li class='{{ setActive('agent/tasks') }}'><a href="/agent/tasks"><i class="fa fa-flag-o"></i> Tech </a></li>
    </ul>
</div>
<!-- /.navbar-collapse -->