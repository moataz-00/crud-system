<?php

//CONNECTION
include('../app/connection.php');
include('../app/functions.php');
//UI
include('../shared/header.php');
include('../shared/nav.php');


$select="SELECT * FROM `message`";
$s=mysqli_query($conn,$select);


if (isset($_GET['show'])) {
    $id = $_GET['show'];
    $select = "SELECT * FROM `message` where id=$id";
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);
}
auth(1);

?>
<h1 class="text-center text-info display-5 my-2">VIEW MESSAGE</h1>
<div  class="container col-6"data-aos="fade-up"
     data-aos-duration="3000" >
    <div class="card bg-dark text-center">
       
        <div class="card-body text-center">
            <h5 class="card-title text-center"> <?php echo $row['name'] ?></h5>

        </div>
        <ul class=" mx-auto list-group list-group-flush rounded border border-3 border-info border-opacity-200 col-6">
            <li class="list-group-item  "> EMAIL : <?php echo $row['email'] ?></li>
            <li class="list-group-item">SUBJECT : <?php echo $row['subject'] ?></li>
            <li class="list-group-item">MESSAGE : <?php echo $row['message'] ?></li>
        </ul>
        <div class="card-body">
            <a href="./message.php" class="card-link btn btn-outline-light">BACK</a>
           
        </div>
    </div>





    <?php
    include('../shared/footer.php');

    ?>