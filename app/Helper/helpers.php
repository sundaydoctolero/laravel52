<?php
function setActive($path)
{
    return Request::path() == $path ? 'active' : '';
}

function hello_world(){
    return "hello";
}
