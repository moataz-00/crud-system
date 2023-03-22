<?php

//CONNECTION
include('../app/connection.php');
include('../app/functions.php');
//UI
include('../shared/header.php');
include('../shared/nav.php');

if(isset($_POST['send'])){
$name=$_POST['name'];

if(empty($name)){
    echo "<div class='text-center fs-3 alert alert-danger'>PLEASE ENTER DEPARTMENT NAME</div>";
}else{
    $insert="INSERT into `department`values(null,'$name',default);";
    $i=mysqli_query($conn,$insert);
    tsestmessage($i, 'insert');
    path('department/list.php');
    }
}






auth(1);
?>

<div class="text-center text-info display-3 m-5">ADD DEPARTMENT</div>
<div class="container col-6">
<div class="card bg-dark">
    <div class="card-body">
        <form method="post">
            <div class="form-group">
                <label class="text-light" for="">DEPARTMENT NAME</label>
                <input  class="form-control" name="name" type="text">

            </div>

            <div class="text-center mt-3"> <button name="send" class="btn btn-outline-info mt-3">SUBMIT</button></div>




        </form>
    </div>
</div>
</div>


<?php
include('../shared/footer.php');

?>