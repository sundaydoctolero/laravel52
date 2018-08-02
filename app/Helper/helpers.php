<?php
function setActive($path)
{
    return request()->path() == $path ? 'active' : '';
}

function status_color($status){
    if($status == 'Pending'){
        return 'red';
    }elseif($status == 'Open'){
        return 'green';
    } else {
        return 'blue';
    }
}

function batching_label($count){

    if($count == 1) {
        return "<span class='badge bg-aqua'>"."Auto"."</span>";
    } else {
        return "<span class='badge bg-red'>"."Manual"."</span>";
    }
}




function hello_world(){
    return "hello";


}
