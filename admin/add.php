<?php

//CONNECTION
include('../app/connection.php');
include('../app/functions.php');
//UI
include('../shared/header.php');
include('../shared/nav.php');

if(isset($_POST['send'])){
$name=$_POST['name'];
$password=$_POST['password'];
$role=$_POST['role'];
$insert="INSERT into `admins`values(null,'$name','$password',$role);";
$i=mysqli_query($conn,$insert);
tsestmessage($i, 'insert');
path('admin/list.php');
}

auth();

// if($_SESSION['role']==1){
//     header("location:/test/system/employee/list.php");
// }


?>

<div class="text-center text-info display-3 m-5">ADD ADMIN</div>
<div class="container col-6">
<div class="card bg-dark">
    <div class="card-body">
        <form method="post">
            <div class="form-group my-2">
                <label class="text-light" for="">NAME</label>
                <input  class="form-control" name="name" type="text">

            </div>

            <div class="form-group my-2">
                <label class="text-light" for="">PASSWORD</label>
                <input  class="form-control" name="password" type="text">

            </div>

            <div class="form-group my-2">
                <label class="text-light" for="">ROLE</label>
                <select name="role" id="" class="form-control">

                <option value="0">SUPER ADMIN</option>
                <option value="1">SUB ADMIN</option>
                </select>
            </div>

            <div class="text-center mt-3"> <button name="send" class="btn btn-outline-info mt-3">SUBMIT</button></div>




        </form>
    </div>
</div>
</div>


<?php
include('../shared/footer.php');

?>