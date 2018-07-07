<?php
function setActive($path)
{
    if ($path == 'admin'){
        return Request::path() == $path ? 'active' :  '';
    }
    else {
        return Request::is($path . '*') ? 'active' :  '';
    }
}

function hello_world(){
    return "hello";
}