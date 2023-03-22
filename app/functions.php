<?php


function tsestmessage($condtion, $message)
{
    if ($condtion) {
        echo "<div class='alert alert-success col-5 mx-auto'>
        $message DONE
        </div>";
    } else {
        echo "<div class='alert alert-success col-5 mx-auto'>
        $message FAILED
        </div>";
    }
};


function path($go){
    echo"<script>location.replace('/test/system/$go')</script>";
}



function auth($role1=null){
    if($_SESSION['admin']){
        if($_SESSION['admin']['role']==0||$_SESSION['admin']['role']==$role1){
            
        }else{
            path("admin/login.php");
        }
    }else{
        path("admin/login.php");
    }



    
}

function filter($value){
    $value=trim($value);
    $value=strip_tags($value);
    $value=htmlspecialchars($value);
    $value=stripslashes($value);
    return $value;
        }
