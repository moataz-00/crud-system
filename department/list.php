<?php

//CONNECTION
include('../app/connection.php');
include('../app/functions.php');
//UI
include('../shared/header.php');
include('../shared/nav.php'); 


$select="SELECT * FROM `department`";
$s=mysqli_query($conn,$select);


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM `department` where id=$id";
    $d = mysqli_query($conn, $delete);
    header("location:list.php");
}



//select by name

if (isset($_POST['search'])) {
    $name = $_POST['name'];
    $search = "SELECT * FROM `department` WHERE name='$name'";
    $f = mysqli_query($conn, $search);
    //header("location:curd.php");
    //tsestmessage($f, "found");
}
if(!$_SESSION['admin']){
    header("location:/test/system/admin/login.php");
}

?>
<h1 class="text-center text-info display-5 my-2">LIST OF DEPARTMENTS</h1>
<div class="pt-5 container col-6 ">
        <table class=" table table-dark table-striped  col-7">

            <form method="post">
                <div class="mb-3 d-flex" role="search">
                    <input class="form-control me-2" type="search" name="name" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" name="search">Search</button>
                </div>
                
            </form>

            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>ACTION</th>
               
            </tr>

           

            <?php

           




            if (isset($_POST['search'])) :


                foreach ($f as $data) : ?>
                    <tr>
                        <th><?php echo $data['id'] ?></th>
                        <th><?php echo $data['name'] ?></th>
                       
                        <td><a class="btn btn-outline-info" href="/test/system/department/edit.php?edit=<?php echo $data['id'] ?>">UPDATE</a><a class="btn btn-outline-danger mx-3" href="/test/system/department/list.php?delete=<?php echo $data['id'] ?>">DELETE</a></td>
                    </tr>

                <?php endforeach;

            else :

                foreach ($s as $data) : ?>
                    <tr>
                        <th><?php echo $data['id'] ?></th>
                        <th><?php echo $data['name'] ?></th>
                      
                        <td><a class="btn btn-outline-info" href="/test/system/department/edit.php?edit=<?php echo $data['id'] ?>">UPDATE</a><a class="btn btn-outline-danger mx-3" href="/test/system/department/list.php?delete=<?php echo $data['id'] ?>">DELETE</a></td>
                    </tr>
            <?php endforeach;

            endif; ?>




        </table>

        
    </div>
    <?php
include('../shared/footer.php');

?>