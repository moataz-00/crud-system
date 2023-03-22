<?php

//CONNECTION
include('../app/connection.php');
include('../app/functions.php');
//UI
include('../shared/header.php');
include('../shared/nav.php');



if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $select = "SELECT * FROM `admins` where id =$id";
    $s = mysqli_query($conn, $select);

    $data = mysqli_fetch_assoc($s);





    if (isset($_POST['send'])) {
        $name = $_POST['name'];
        $password=$_POST['password'];
        $insert = "UPDATE  `admins`SET name='$name',`password`='$password' where id=$id;";
        $i = mysqli_query($conn, $insert);
        tsestmessage($i, 'update');
       path('admin/list.php');
    }
}
auth();



?>

<div class="text-center text-info display-3 m-5">EDIT ADMIN</div>
<div class="container col-6">
    <div class="card bg-dark">
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label class="text-light" for="">NAME</label>
                    <input class="form-control" name="name"  type="text" value="<?php echo $data['name'] ?>">

                </div>


                <div class="form-group">
                    <label class="text-light" for="">PASSWORD</label>
                    <input class="form-control" name="password"  type="text" value="<?php echo $data['password'] ?>">

                </div>
                <div class="text-center mt-3"><button name="send" class="btn btn-outline-info mt-3">UPDATE ADMIN </button></div>




            </form>
        </div>
    </div>
</div>


<?php
include('../shared/footer.php');

?>