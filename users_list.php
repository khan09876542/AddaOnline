<?php
require 'config/conn.php';

$selectQuery = "SELECT * FROM users";
$stmt = $conn->prepare($selectQuery);
$stmt->execute();




?>
<!DOCTYPE html>
<html lang="en" data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-direction="ltr" dir="ltr" data-pc-theme="light">
  <!-- [Head] start -->

  <head>
    <title>Traveling System</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            <h3>UserList</h3>
            <br>
            <br>
          <table class="table">

            <thead>
              <th>UserId</th>
              <th>UseName</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Date</th>
              <th>Edit</th>
            </thead>
            <?php
            $count = 1;

            while ($select = $stmt->fetch(PDO::FETCH_ASSOC)) {
             
             ?>
             <tr>
               <td><?=$count++ ?></td>
               <td><?= $select['username'] ?></td>
               <td><?= $select['email'] ?></td>
               <td><?= $select['phone'] ?></td>
               <td><?= $select['created_at'] ?></td>
               <td><a href="update_users_list.php?id=<?= $select['id'] ?>"  class="btn btn-success"><i class="fa fa-edit"></i></a>
            <a href="delete.php?id=<?= $select['id'] ?>"
            class="btn btn-danger"
            onclick="return deleteConfirm(this);">
            <i class="fa fa-trash"></i>
            </a>
               </td>
             </tr>
            
             <?php
             } 
              ?>
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
<script>

function deleteConfirm(el) {
  Swal.fire({
    title: 'Are you sure?',
    text: "you want to delete data!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Yes, delete it!',
    cancelButtonText: 'Cancel'
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = el.href; 
    }
  });

  return false;   
}
</script>


</script>
<?php if (isset($_GET['msg']) && $_GET['msg'] == 'deleted') { ?>
<script>
Swal.fire({
  icon: 'success',
  title: 'Deleted!',
  text: 'Data deleted successfully',
  confirmButtonColor: '#28a745'
});
</script>
<?php } ?>




</script>
<?php if (isset($_GET['msg']) && $_GET['msg'] == 'updated') { ?>
<script>
Swal.fire({
  icon: 'success',
  title: 'Updated!',
  text: 'Data updated successfully',
  confirmButtonColor: '#28a745'
});
</script>
<?php } ?>


