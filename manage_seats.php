<?php
session_start();

include("config/conn.php");

if (isset($_GET['id'])) {
    $bus_id = $_GET['id'];
    $_SESSION['id'] = $bus_id;
} elseif (isset($_SESSION['id'])) {
    $bus_id = $_SESSION['id'];
} else {
    echo "<script>alert('Please select a bus first');</script>";
    echo "<script>window.location.href='bus_list.php';</script>";
    exit;

}

    $query = "SELECT bus_no , total_seats FROM buses WHERE id = $bus_id;";
    $stmt = $conn->prepare($query);
    $stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);





?>
<!DOCTYPE html>
<html lang="en" data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-direction="ltr" dir="ltr" data-pc-theme="light">
  <!-- [Head] start -->

  <head>
    <style>
.seat-grid {
    display: grid;
    grid-template-columns: repeat(5, 60px); /* 5 seats per row */
    gap: 10px;
}
.seat {
    padding: 15px;
    text-align: center;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
}
.seat.available {
    background-color: #ddd;
}
.seat.booked {
    background-color: #f88;
    cursor: not-allowed;
}
.seat.selected {
    background-color: #8f8 !important;
}
</style>
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
    	<th>busNo <br><?=$row['bus_no'] ?></th>
    	<th>TotalSeats <br><?=$row['total_seats'] ?></th>
    </tr>
</thead>
  
    </table>
    <?php
$totalSeats = $row['total_seats'];
$bookedSeats = [];

// $q = $conn->prepare("SELECT seat_no FROM seats WHERE bus_id = ? AND status = 'booked'");
// $q->execute([$bus_id]);

// while ($r = $q->fetch(PDO::FETCH_ASSOC)) {
//     $bookedSeats[] = $r['seat_no'];
// }

echo '<div class="seat-grid">';
for ($i = 1; $i <= $totalSeats; $i++) {
    $class = in_array($i, $bookedSeats) ? 'seat booked' : 'seat available';
    echo "<div class='$class' data-seat='$i'>$i</div>";
}
echo '</div>';
?>

<button id="saveSeats" class="btn btn-success mt-3">Save Seats</button>
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
<script>
document.querySelectorAll('.seat.available').forEach(seat => {
    seat.addEventListener('click', function() {
        this.classList.toggle('selected');
        if(this.classList.contains('selected')){
            this.style.backgroundColor = '#8f8'; // selected color
        } else {
            this.style.backgroundColor = '#ddd'; // deselected
        }
    });
});

</script>

