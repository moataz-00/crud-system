
<?php
session_start();

if(isset($_GET['logout'])){
session_unset();
session_destroy();
header("location:/test/system/admin/login.php");
};

?>



<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">LAVA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <?php if (isset($_SESSION['admin'])):?>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        

      <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
      <ul class="navbar-nav">

      
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            DEPARTMENT
          </a>
          <ul class="dropdown-menu dropdown-menu-dark">
          <li class="nav-item mx-2">
          <a class="nav-link  btn btn-outline-info" aria-current="page" href="/test/system/department/add.php">ADD DEPARTMENT</a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link btn  btn-outline-info " href="/test/system/department/list.php">DISPLAY DEPARTMENT</a>
        </li>
            
          </ul>
        </li>
      </ul>
    </div>




    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            EMPLOYEES
          </a>
          <ul class="dropdown-menu dropdown-menu-dark">
          <li class="nav-item mx-2">
          <a class="nav-link btn btn-outline-info" href="/test/system/employee/add.php">ADD EMPLOYEE</a>
        </li>
        <li class="nav-item mx-2">
          <a href="/test/system/employee/list.php" class=" nav-link  btn btn-outline-info">DISPLAY EMPLOYEE</a>
        </li>
            
          </ul>
        </li>
      </ul>
    </div>

<?php endif; ?>
    
        



        
       

        
      
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <?php if(!isset($_SESSION['admin'])):?>
  <a href="/test/system/admin/login.php" class="  btn btn-outline-primary">LOGIN</a>
<?php else:?>
  <form action="">
  <button name="logout" href="/test/system/admin/login.php" class="  btn btn-outline-danger">LOGOUT</button>
  </form>
<?php endif;?>
  
</div>
  </div>
</nav>