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
    } else if($count == 0){
        return "<span class='badge bg-blue'>"."Pending"."</span>";
    }else {
        return "<span class='badge bg-red'>"."Manual"."</span>";
    }
}

function today(){
    return \Carbon\Carbon::now()->toDateString();
}

function day_int($day_code){
    if($day_code == "Mon"){
        return 0;
    }elseif($day_code == 'Tue'){
        return 1;
    }elseif($day_code == 'Wed'){
        return 2;
    }elseif($day_code == 'Thu'){
        return 3;
    }elseif($day_code == 'Fri'){
        return 4;
    }elseif($day_code == 'Sat'){
        return 5;
    }elseif($day_code == 'Sun'){
        return 6;
    }
}


function hello_world(){
    return "hello";
}
