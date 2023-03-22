<?php

//CONNECTION
include('../app/connection.php');
include('../app/functions.php');
//UI
include('../shared/header.php');
include('../shared/nav.php');


$select="SELECT * FROM `message`";
$s=mysqli_query($conn,$select);


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];



    $delete = "DELETE FROM `message` where id=$id";
    $d = mysqli_query($conn, $delete);
    header("location:message.php");
}



//select by name

if (isset($_POST['search'])) {
    $name = $_POST['name'];
    $search = "SELECT * FROM `message` WHERE name='$name'";
    $f = mysqli_query($conn, $search);
    //header("location:curd.php");
    //tsestmessage($f, "found");
}


auth(1);

?>


<h1 class="text-center text-info display-5 my-2">LIST OF MESSAGES</h1>
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
                        <th class="text-center"><?php echo $data['name'] ?></th>
                      
                        
                       
                        <td class="text-center"><a class="btn btn-outline-primary mx-3" href="/test/system/message/view.php?show=<?php echo $data['id'] ?>">VIEW</a> <a class="btn btn-outline-danger mx-3" href="/test/system/message/message.php?delete=<?php echo $data['id'] ?>">DELETE</a></td>
                    </tr>

                <?php endforeach;

            else :

                foreach ($s as $data) : ?>
                    <tr>
                        <th><?php echo $data['id'] ?></th>
                        <th class="text-center"><?php echo $data['name'] ?></th>
                       
                        
                      
                        <td class="text-center"><a class="btn btn-outline-primary mx-3" href="/test/system/message/view.php?show=<?php echo $data['id'] ?>">VIEW</a> <a class="btn btn-outline-danger mx-3" href="/test/system/message/message.php?delete=<?php echo $data['id'] ?>">DELETE</a></td>
                    </tr>
            <?php endforeach;

            endif; ?>




        </table>

        
    </div>
    <?php
include('../shared/footer.php');

?>