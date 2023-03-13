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

?>
