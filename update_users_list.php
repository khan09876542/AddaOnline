<?php
require 'config/conn.php';
$id = $_GET['id'];

// ---------------------SELECT QUERY------------------
$selectQuery = "SELECT * FROM users WHERE id = $id";
$stmt = $conn->prepare($selectQuery);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['submit'])) {
	
	$username = $_POST['username'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];

// ----------------------UPDATE QUERY-------------------
	$updateQuery = "UPDATE users SET username = '$username' , email = '$email' , phone = '$phone' WHERE id = $id;";
	$stmt = $conn->prepare($updateQuery);
	$stmt->execute();

// -------------LOCATION----------------
	header("Location: users_list.php?msg=updated");
	exit;
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
            
          <div class="content-wrapper">
    <section class="content">
       <div class="container-fluid">

            <h4>Update Users</h4>

            <form method="POST">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="username" class="form-control" value="<?= $row['username'] ?>">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?= $row['email'] ?>">
                </div>

                 <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control" value="<?= $row['phone'] ?>">
                </div>
              <br>
              <center>
                <button name="submit" class="btn btn-primary me-3">
                    Update
                </button>
                </center>
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

    
  <?php
  include 'config/layOut_sitting.php'; 
   ?>
    

  </body>
  <!-- [Body] end -->
</html>
