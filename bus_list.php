  <?php
session_start();

include 'config/conn.php';

if (!isset($_SESSION['user_id'])) {
  header("Location: index.php");
  exit;
}

$query = "SELECT * FROM buses";

$stmt = $conn->prepare($query);
$stmt->execute(); 
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
        <div class="grid grid-cols-4 gap-x-6">
          <div class="col-span-12 xl:col-span-4 md:col-span-6">
            <h3>bus list</h3>
            <br>
         <table class="table">
    <thead>      
    <tr>
      <th scope="col">Id</th>
      <th scope="col">bus_No</th>
      <th scope="col">total_Seats</th>
      <th scope="col">Route_from</th>
      <th scope="col">Route_to</th>
      <th scope="col">Date</th>
      <th scope="col">Status</th>
    </tr>
    <!-------------------TABLE BODY------------------->
    <tbody>
      <?php
      $count = 1;
      while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
         
       
       ?>
    <tr>
      <td><?php echo $count++ ?></td>
      <td><?php echo $data['bus_no']; ?></td>
      <td><?php echo $data['total_seats']; ?></td>
      <td><?php echo $data['route_from']; ?></td>
      <td><?php echo $data['route_to']; ?></td>
      <td><?php echo $data['created_at']; ?></td>
      <td><?php echo $data['status']; ?></td>
      <td>
        <a href="manage_seats.php?id=<?= $data['id'] ?>" 
       class="btn btn-sm btn-primary">
       Manage Seats
    </a>
      </td>
    </tr>
    <?php
    }  
     ?>
    </tbody>
  </thead>
</table>
    
  

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
