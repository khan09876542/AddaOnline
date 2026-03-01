<?php
session_start();
 include 'config/conn.php';
 if (!isset($_SESSION['user_id'])) {
  header("Location: index.php");
  exit;
}
 if (isset($_POST['save_bus'])) {
   $busNo = $_POST['bus_no'];
   $seats = $_POST['total_seats'];
   $route_from = $_POST['route_from'];
   $route_to = $_POST['route_to'];

try {
$conn->beginTransaction();

  $query = "INSERT INTO buses(`bus_no` , `total_seats` , `route_from` , `route_to`) VALUES('$busNo' , '$seats' , '$route_from' , ' $route_to');";

$stmt = $conn->prepare($query);
$stmt->execute();
  $conn->commit();
} catch (Exception $e) {
$conn->rollback();
}

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
    <meta
      name="description"
      content="Datta Able is trending dashboard template made using Bootstrap 5 design framework. Datta Able is available in Bootstrap, React, CodeIgniter, Angular,  and .net Technologies."
    />
    <meta
      name="keywords"
      content="Bootstrap admin template, Dashboard UI Kit, Dashboard Template, Backend Panel, react dashboard, angular dashboard"
    />
    <meta name="author" content="CodedThemes" />

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

            <h4>Register New Bus</h4>

            <form method="POST">
                <div class="form-group">
                    <label>Bus Number</label>
                    <input type="text" name="bus_no" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Total Seats</label>
                    <input type="number" name="total_seats" class="form-control" required>
                </div>

                 <div class="form-group">
                    <label>From</label>
                    <input type="text" name="route_from" class="form-control" required>
                </div>

                 <div class="form-group">
                    <label>To</label>
                    <input type="text" name="route_to" class="form-control" required>
                </div>
              <br>
              
                <button name="save_bus" class="btn btn-primary">
                    Register
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
