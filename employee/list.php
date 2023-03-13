<?php

//CONNECTION
include('../app/connection.php');
include('../app/functions.php');
//UI
include('../shared/header.php');
include('../shared/nav.php');


$select="SELECT * FROM `empwithdep`";
$s=mysqli_query($conn,$select);


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

//select image
$selectimage="SELECT `image` FROM `employee` where id= $id";
$runselect=mysqli_query($conn,$selectimage);
$row=mysqli_fetch_assoc($runselect);
$image=$row['image'];
unlink("./upload/$image");

    $delete = "DELETE FROM `employee` where id=$id";
    $d = mysqli_query($conn, $delete);
    header("location:list.php");
}



//select by name

if (isset($_POST['search'])) {
    $name = $_POST['name'];
    $search = "SELECT * FROM `empwithdep` WHERE empname='$name'";
    $f = mysqli_query($conn, $search);
    //header("location:curd.php");
    //tsestmessage($f, "found");
}


if(!$_SESSION['admin']){
    header("location:/test/system/admin/login.php");
}

?>
<h1 class="text-center text-info display-5 my-2">LIST OF EMPLOYEES</h1>
<div class="pt-5 container col-6 ">
        
            <form method="post">
                <div class="mb-3 d-flex" role="search">
                    <input id="myInput" class="form-control me-2"  type="search" name="name" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" name="search">Search</button>
                </div>
                
            </form>
            <table id="myTable" class=" table table-dark table-striped  ">

            <tr>
                <th>ID</th>
                <th class="text-center">NAME</th>
                
                <th class="text-center">ACTION</th>
               
            </tr>

           

            <?php

           




            if (isset($_POST['search'])) :


                foreach ($f as $data) : ?>
                    <tr id="">
                        <th><?php echo $data['id'] ?></th>
                        <th class="text-center"><?php echo $data['empname'] ?></th>
                      
                        
                       
                        <td class="text-center"><a class="btn btn-outline-primary mx-3" href="/test/system/employee/profile.php?show=<?php echo $data['id'] ?>">VIEW</a> <a class="btn btn-outline-info" href="/test/system/employee/edit.php?edit=<?php echo $data['id'] ?>">UPDATE</a><a class="btn btn-outline-danger mx-3" href="/test/system/employee/list.php?delete=<?php echo $data['id'] ?>">DELETE</a></td>
                    </tr>

                <?php endforeach;

            else :

                foreach ($s as $data) : ?>
                    <tr>
                        <th><?php echo $data['id'] ?></th>
                        <th class="text-center"><?php echo $data['empname'] ?></th>
                       
                        
                      
                        <td class="text-center"><a class="btn btn-outline-primary mx-3" href="/test/system/employee/profile.php?show=<?php echo $data['id'] ?>">VIEW</a> <a class="btn btn-outline-info" href="/test/system/employee/edit.php?edit=<?php echo $data['id'] ?>">UPDATE</a><a class="btn btn-outline-danger mx-3" href="/test/system/employee/list.php?delete=<?php echo $data['id'] ?>">DELETE</a></td>
                    </tr>
            <?php endforeach;

            endif; ?>




        </table>

        
    </div>
    <?php
include('../shared/footer.php');

?>