<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: index.php");
  exit;
  }
 include 'config/conn.php';
if (isset($_POST['submit'])) {
  $userName = ucwords($_POST['username']);
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password = password_hash($password, PASSWORD_BCRYPT);
  $phone = $_POST['phone'];

  $insertUsers = "INSERT INTO users(username, email, password, phone) VALUES(:username, :email, :password, :phone);";

  $stmt = $conn->prepare($insertUsers);
  $stmt->execute([
    ':username' => $userName,
    ':email' => $email,
    ':password' => $password,
    ':phone' => $phone
  ]);
}
 ?>


<!DOCTYPE html>
<html lang="en" data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-direction="ltr" dir="ltr" data-pc-theme="light">
  <!-- [Head] start -->
  <head>
   
    <title>Traveling System</title>
    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />

    <!-- [Favicon] icon -->
    <link rel="icon" href="assets/images/favicon.svg" type="image/x-icon" />

  <!-----------------CSS LINKS---------------->
     <?php
     include 'config/site_css_links.php';
     ?>

  </head>
  <body>

 <!--------------------PAGE LOADER----------------->
<?php 
include 'config/page_loader.php';
 ?>

<!--------------SIDEBAR--------------->
<?php
include 'config/sideBar.php';
?>

<!-----------------PAGE HEADER----------------->
<?php
include 'config/header.php';
?>
    <!-- [ Main Content ] start -->
    <div class="pc-container">
      <div class="pc-content">
        <!--------------------BREAD CRUMB------------------->
       <?php
       include 'config/breadCrumb.php';
       ?>

        <!-----------------------PAGE MAIN CONTENT-------------------->
      <div class="grid grid-cols-12 gap-x-6">
      <div class="col-span-12 xl:col-span-4 md:col-span-6">
        <div class="content-wrapper">
      <section class="content">
        <div class="container-fluid">
          <!-----------ADD Users-------------->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                Add Users
        </button>

<!-- Modal -->
 <form method="post">
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Register Users</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="text" name="username" placeholder="your Name..." class="form-control">
        
        <input type="text" name="email" placeholder="Your Email..." class="form-control mt-3">
        
        <input type="text" name="password" placeholder="Your Password..." class="form-control mt-3">
        
        <input type="text" name="phone" placeholder="Your Phone..." class="form-control mt-3">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </div>
    </div>
  </div>
</div>
</form>
</div>
</div>
</section>
 </div>
 </div>
 </div>
 </div>
 </div>
    <?php
    include 'config/footer.php';
    ?>

    <!----------------JS LINKS----------------->
   <?php
   include 'config/site_js_links.php';
   ?>

<!----------------LAYOUT SETTING-------------------->
  <?php
  include 'config/layOut_sitting.php'; 
   ?>
    
  </body>
</html>
