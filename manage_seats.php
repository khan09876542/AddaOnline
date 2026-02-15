<?php
include 'config/conn.php';
$id = $_GET['id'];

$query = "SELECT bus_no , total_seats from buses where id = $id";
$stmt = $conn->prepare($query);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en" data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-direction="ltr" dir="ltr" data-pc-theme="light">
  <!-- [Head] start -->

  <head>
    <title></title>
    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   
    
    <!-- [Favicon] icon -->
    <link rel="icon" href="A:/apache/htdocs/adda_online/assets/images/favicon.svg" type="" />
  
  <!-- ----------------CSS LINKS---------------- -->
 <?php
 include 'config/site_css_links.php'; 
  ?>

  </head>
  <body>


    <!-- ------------------PRE LOADER-------------- -->
   <?php
   include 'config/page_loader.php'; 
    ?>

    <?php
    include 'config/sidebar.php'; 
     ?>

     <?php
     include 'config/header.php'; 
      ?>
     <div class="pc-container">
      <div class="pc-content">
        <!--------------------BREAD CRUMB------------------->
       <?php
       include 'config/breadCrumb.php';
       ?>

        <!-----------------------PAGE MAIN CONTENT-------------------->
        <div class="grid grid-cols-4 gap-x-6">
          <div class="col-span-12 xl:col-span-4 md:col-span-6">
            <h3>Manage Seats</h3>
            <br>
            <br>
         <table class="table">
    <thead>      
    <tr>
    	<th>busNo <br><?= $row['bus_no']; ?></th>
    	<th>TotalSeats <br><?= $row['total_seats'] ?></th>
    </tr>
</thead>


</table>


</div>
</div>
</div>
</div>
</div>
<!-- ---------------START REGISTER------------------- -->
    <!-- [ Main Content ] end -->
    <!-- Required Js -->
    <?php
    include 'config/site_js_links.php'; 
     ?>

    <?php 

    include 'config/layOut_sitting.php';
     ?>
    
 
  </body>
  <!-- [Body] end -->
</html>
