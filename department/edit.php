<?php

//CONNECTION
include('../app/connection.php');
include('../app/functions.php');
//UI
include('../shared/header.php');
include('../shared/nav.php');



if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $select = "SELECT * FROM `department` where id =$id";
    $s = mysqli_query($conn, $select);

    $data = mysqli_fetch_assoc($s);





    if (isset($_POST['send'])) {
        $name = $_POST['name'];
        $insert = "UPDATE  `department`SET name='$name'where id=$id;";
        $i = mysqli_query($conn, $insert);
        tsestmessage($i, 'update');
       path('department/list.php');
    }
}
auth(1);

?>

<div class="text-center text-info display-3 m-5">EDIT DEPARTMENT</div>
<div class="container col-6">
    <div class="card bg-dark">
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label class="text-light" for="">NAME</label>
                    <input class="form-control" name="name"  type="text" value="<?php echo $data['name'] ?>">

                </div>

                <div class="text-center mt-3"><button name="send" class="btn btn-outline-info mt-3">UPDATE DEPARTMENT </button></div>




            </form>
        </div>
    </div>
</div>


<?php
include('../shared/footer.php');

?>