<?php
session_start();
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

            <h4>Register Users</h4>

            <form method="POST">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="username" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                 <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="password" class="form-control" required>
                </div>

                 <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control" required>
                </div>
              <br>

                <button name="submit" class="btn btn-primary">
                    submit
                </button>
            </form>

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

    <div class="floting-button fixed bottom-[50px] right-[30px] z-[1030]">
    </div>

<!----------------LAYOUT SETTING-------------------->
  <?php
  include 'config/layOut_sitting.php'; 
   ?>
    

  </body>
  
</html>
