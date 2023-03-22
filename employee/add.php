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
    $name = filter($_POST['name']);
    $salary =filter($_POST['salary']) ;
    //image code
    $image = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $location = "upload/" . $image;
    move_uploaded_file($tempname, $location);

    $depId = $_POST['depId'];


    if (empty($name) ) {
        echo  "<div class='text-center fs-3 alert alert-danger'>PLEASE ENTER EMPLOYEE NAME</div>";
    }elseif((empty($salary))||(!filter_var($salary,FILTER_VALIDATE_INT))) {
        echo  "<div class='text-center fs-3 alert alert-danger'>PLEASE ENTER EMPLOYEE SALARY</div>";
    }elseif(empty($image)){
        echo  "<div class='text-center fs-3 alert alert-danger'>PLEASE ENTER EMPLOYEE PICTURE</div>";
    }
    
    
    else {
        $insert = "INSERT into `employee`values(null,'$name',$salary,'$image',$depId,default);";
        $i = mysqli_query($conn, $insert);
        tsestmessage($i, 'insert');
        path('employee/list.php');
    }
}



auth(1);
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



                <div class="text-center mt-3"> <button name="send" class="btn btn-outline-info mt-3">SUBMIT</button></div>




            </form>
        </div>
    </div>
</div>


<?php
include('../shared/footer.php');

?>