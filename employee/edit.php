<?php

//CONNECTION
include('../app/connection.php');
include('../app/functions.php');
//UI
include('../shared/header.php');
include('../shared/nav.php');

$select = "SELECT * FROM `department`";
$department = mysqli_query($conn, $select);


if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $select = "SELECT * FROM `empwithdep` where id =$id";
    $s = mysqli_query($conn, $select);

    $data = mysqli_fetch_assoc($s);





    if (isset($_POST['send'])) {
        $name = $_POST['name'];
        $salary = $_POST['salary'];


        //image code

        if (!empty($_FILES['image']['name'])) {
            $image = $_FILES['image']['name'];
            $tempname = $_FILES['image']['tmp_name'];
            $location = "upload/" . $image;
            move_uploaded_file($tempname, $location);
            $imagename = $data['image'];
            unlink("./upload/$imagename");
        } else {
            $image = $data['image'];
        };

        $depid = $_POST['depId'];
        $insert = "UPDATE  `employee`SET name='$name',salary=$salary,image='$image',dep_id=$depid   where id=$id;";
        $i = mysqli_query($conn, $insert);
        tsestmessage($i, 'update');
        path('employee/list.php');
    }
}

if(!$_SESSION['admin']){
    header("location:/test/system/admin/login.php");
}


?>

<div class="text-center text-info display-3 m-5">EDIT EMPLOYEE</div>
<div class="container col-6">
    <div class="card bg-dark">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="text-light" for="">NAME</label>
                    <input class="form-control" name="name" type="text" value="<?php echo $data['empname'] ?>">

                </div>

                <div class="form-group">
                    <label class="text-light" for="">SALARY</label>
                    <input class="form-control" name="salary" type="text" value="<?php echo $data['salary'] ?>">

                </div>
                <span><img style="height: 1.5in;" width="20%" src="./upload/<?php echo $data['image'] ?>" class="mt-3 rounded-circle text-center" alt=""></span>
                <div class="form-group my-2">
                    <label class="text-light" for="">IMAGE</label>
                    <input class="form-control" name="image" type="file">



                </div>

                <div class="form-group my-2">
                    <label class="text-light" for="">DEPARTMENT ID</label>

                    <select class="form-control" name="depId" id="">
                        <option value=""><?php echo $data['depname'] ?></option>
                        <?php foreach ($department as $data) : ?>
                            <option value="<?php echo $data['id'] ?>">
                                <?php echo $data['name'] ?>

                            </option>
                        <?php endforeach ?>


                    </select>
                </div>

                <button name="send" class="btn btn-outline-info mt-3">UPDATE DEPARTMENT </button>




            </form>
        </div>
    </div>
</div>


<?php
include('../shared/footer.php');

?>