<?php

//CONNECTION
include('../app/connection.php');
include('../app/functions.php');
//UI
include('../shared/header.php');
include('../shared/nav.php');

if(isset($_POST['send'])){
$name=$_POST['name'];
$insert="INSERT into `department`values(null,'$name',default);";
$i=mysqli_query($conn,$insert);
tsestmessage($i, 'insert');
path('department/list.php');
}

if(!$_SESSION['admin']){
    header("location:/test/system/admin/login.php");
}
?>

<div class="text-center text-info display-3 m-5">ADD DEPARTMENT</div>
<div class="container col-6">
<div class="card bg-dark">
    <div class="card-body">
        <form method="post">
            <div class="form-group">
                <label class="text-light" for="">NAME</label>
                <input  class="form-control" name="name" type="text">

            </div>

            <button name="send" class="btn btn-outline-info mt-3">SUBMIT</button>




        </form>
    </div>
</div>
</div>


<?php
include('../shared/footer.php');

?>