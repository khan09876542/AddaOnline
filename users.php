<?php
include 'config/conn.php';

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
