<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
    <ul class="nav navbar-nav">
        <li class='{{ \Request::is('/') ? 'active' : null }}'><a href="/">Home <span class="sr-only">(current)</span></a></li>
        <li class='{{ \Request::is('agent/tasks') ? 'active' : null }}'><a href="/agent/tasks"> Task </a></li>
    </ul>
</div>
<!-- /.navbar-collapse -->