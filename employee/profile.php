<?php

//CONNECTION
include('../app/connection.php');
include('../app/functions.php');
//UI
include('../shared/header.php');
include('../shared/nav.php');


$select="SELECT * FROM `empwithdep`";
$s=mysqli_query($conn,$select);


if (isset($_GET['show'])) {
    $id = $_GET['show'];
    $select = "SELECT * FROM `empwithdep` where id=$id";
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);
}
auth(1);

?>
<h1 class="text-center text-info display-5 my-2">VIEW CARD</h1>
<div  class="container col-6"data-aos="fade-up"
     data-aos-duration="3000" >
    <div class="card bg-dark text-center">
        <div class="text-center"><img width="50%" style="height: 3in; " src="./upload/<?php echo $row['image'] ?>" class=" rounded-circle text-center" alt=""></div>
        <div class="card-body text-center">
            <h5 class="card-title text-center"> <?php echo $row['empname'] ?></h5>

        </div>
        <ul class=" mx-auto list-group list-group-flush rounded border border-3 border-info border-opacity-200 col-6">
            <li class="list-group-item  "> SALARY : <?php echo $row['salary'] ?></li>
            <li class="list-group-item">DEPARTMENT : <?php echo $row['depname'] ?></li>
        </ul>
        <div class="card-body">
            <a href="./list.php" class="card-link btn btn-outline-light">BACK</a>
            <?php foreach ($s as $data) : ?>
            <a href= "/test/system/employee/edit.php?edit=<?php echo $data['id'] ?>" class="card-link btn btn-outline-light">UPDATE</a>
            <?php endforeach;?>
        </div>
    </div>





































    <?php
    include('../shared/footer.php');

    ?>