<?php
include 'config/conn.php';
if (isset($_POST['submit'])) {
  // print_r($_POST);
  // exit;

   $username =  $_POST['username'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $password = password_hash($password, PASSWORD_BCRYPT);
   $phone = $_POST['phone'];

   $insertQuery = "INSERT INTO users(username , email , password , phone)VALUES(:username , :email , :password , :phone);";
   $stmt = $conn->prepare($insertQuery);
   $stmt->execute([
   ':username' => $username,
   ':email' => $email,
   ':password' => $password,
   ':phone' => $phone
   ]);
 }; 
 ?>


<!doctype html>
<html lang="en" data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-direction="ltr" dir="ltr" data-pc-theme="light">
  <!-- [Head] start -->

  <head>

    <title>Traveling System</title>
    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
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
            

<form method="POST">
    <div class="row">
  <div class="col">
    <input type="text" class="form-control" placeholder="Name" name="username" required="">
  </div>
  <br>
  <div class="col">
    <input type="text" class="form-control" placeholder="Email" name="email" required="">
  </div>
  <br>
  <div class="col">
    <input type="text" class="form-control" placeholder="Password" name="password" required="">
  </div>
  <br>
  <div class="col">
    <input type="text" class="form-control" placeholder="Phone" name="phone" required="">
  </div>
<br>
<br>
  <center><button class="btn btn-success" name="submit">Adduser</button></center>

</form>
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

    <div class="floting-button fixed bottom-[50px] right-[30px] z-[1030]">
    </div>

    
  <?php
  include 'config/layOut_sitting.php'; 
   ?>
    

  </body>
  <!-- [Body] end -->
</html>
