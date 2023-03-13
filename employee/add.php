<?php

//CONNECTION
include('../app/connection.php');
include('../app/functions.php');
//UI
include('../shared/header.php');
include('../shared/nav.php');


$select = "SELECT * FROM `department`";
$department = mysqli_query($conn, $select);


if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $salary = $_POST['salary'];
//image code
$image=$_FILES['image']['name'];
$tempname=$_FILES['image']['tmp_name'];
$location="upload/" . $image;
move_uploaded_file($tempname,$location);

    $depId = $_POST['depId'];

    $insert = "INSERT into `employee`values(null,'$name',$salary,'$image',$depId,default);";
    $i = mysqli_query($conn, $insert);
    tsestmessage($i, 'insert');
    path('employee/list.php');
}



if(!$_SESSION['admin']){
    header("location:/test/system/admin/login.php");
}
?>

<div class="text-center text-info display-3 m-5">ADD EMPLOYEE</div>
<div class="container col-6">
    <div class="card bg-dark">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group my-2">
                    <label class="text-light" for="">NAME</label>
                    <input class="form-control" name="name" type="text">

                </div>

                <div class="form-group my-2">
                    <label class="text-light" for="">SALARY</label>
                    <input class="form-control" name="salary" type="text">



                </div>


                <div class="form-group my-2">
                    <label class="text-light" for="">IMAGE</label>
                    <input class="form-control" name="image" type="file">



                </div>

                <div class="form-group my-2">
                    <label class="text-light" for="">DEPARTMENT ID</label>

                    <select class="form-control" name="depId" id="">
                        <?php foreach ($department as $data) : ?>
                            <option value="<?php echo $data['id'] ?>">
                                <?php echo $data['name'] ?>

                            </option>
                        <?php endforeach ?>


                    </select>
                </div>



                <button name="send" class="btn btn-outline-info mt-3">SUBMIT</button>




            </form>
        </div>
    </div>
</div>


<?php
include('../shared/footer.php');

?>