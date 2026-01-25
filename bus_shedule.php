<?php
include 'config/conn.php';

$selectQuery = "SELECT id , bus_no from buses";
$stmt = $conn->prepare($selectQuery);
$stmt->execute();

$fetchData = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['submit'])) {
    $bus_id = $_POST['bus_id'];
    $departure_time = $_POST['departure_time'];
    $arrival_time = $_POST['arrival_time'];
    $route_from = $_POST['route_from'];
    $route_to = $_POST['route_to'];

    try {
        $conn->beginTransaction();

       $query = "INSERT INTO bus_shedule
    (bus_id, departure_time, arrival_time, route_from, route_to)
    VALUES (:bus_id, :departure_time, :arrival_time, :route_from, :route_to)";

        $stmt = $conn->prepare($query);
        $stmt->execute([
            ':bus_id' => $bus_id,
            ':departure_time' => $departure_time,
            ':arrival_time' => $arrival_time,
            ':route_from' => $route_from,
            ':route_to' => $route_to
        ]);

        $conn->commit();
        

    } catch (Exception $e) {
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }
}

 ?>

<!doctype html>
<html lang="en" data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-direction="ltr" dir="ltr" data-pc-theme="light">
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

            <h4>Bus Shedule</h4>
            <br>
            <form method="POST">

             <select class="form-select" name="bus_id" aria-label="Default select example">
              <option selected>select Bus No</option>
              <?php foreach ($fetchData as $bus):?>
              <option value="<?= $bus['id'] ?>"><?=$bus['bus_no']?></option>
            <?php endforeach; ?>
            </select>

                <div class="form-group">
                    <label>Defarture Time</label>
                    <input type="time" name="departure_time" class="form-control" required>
                </div>


                <div class="form-group">
                    <label>Arrival Time</label>
                    <input type="time" name="arrival_time" class="form-control" required>
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

                <button name="submit" class="btn btn-primary">
                    Submit
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

    
  <?php
  include 'config/layOut_sitting.php'; 
   ?>
    

  </body>
  <!-- [Body] end -->
</html>
