<?php

//CONNECTION
include('../app/connection.php');
include('../app/functions.php');
//UI
include('../shared/header.php');
include('../shared/nav.php');




if (isset($_POST['login'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    $select = "SELECT * FROM admins WHERE `name`='$name' and `password`=$password";
    $s = mysqli_query($conn, $select);
    $numofrows = mysqli_num_rows($s);
    $row = mysqli_fetch_assoc($s);

    if ($numofrows == 1) {
        $_SESSION['admin'] = [
            "name" => $row['name'],
            "role" => $row['role']
        ];
        // $_SESSION['role']=$row['role'];
        path("employee/list.php");
    } else {

        path("admin/login.php");
    }


    // tsestmessage($s, "login");
    // echo ($numofrows);
}


?>

    <div class="text-center text-info display-3 m-5">LOGIN</div>
    <div class="container col-6">
        <div class="card bg-dark">
            <div class="card-body">
                <form method="post">
                    <div class="form-group">
                        <label class="text-light" for="">NAME</label>
                        <input class="form-control" name="name" type="text">

                    </div>

                    <div class="form-group">
                        <label class="text-light" for="">PASSWORD</label>
                        <input class="form-control" name="password" type="text">

                    </div>
                    <div class="text-center mt-3"> <button name="login" class="btn btn-outline-info mt-3">LOGIN</button></div>




                </form>
            </div>
        </div>
    </div>


    <?php
    include('../shared/footer.php');

    ?>