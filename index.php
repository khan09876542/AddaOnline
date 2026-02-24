<?php
session_start();
include 'config/conn.php';



if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];


    $sql = "SELECT id, email, password FROM users WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {

        if (password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];

            header("Location: dashboard.php");
            exit();

        } else{
       $error =   "wrong password";

    } 
    }else{
       $error = "email not found";
}
}
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

<!-- ---------------START REGISTER------------------- -->
    <div class="auth-main relative">
      <div class="auth-wrapper v1 flex items-center w-full h-full min-h-screen">
        <div class="auth-form flex items-center justify-center grow flex-col min-h-screen relative p-6 ">
          <div class="w-full max-w-[350px] relative">
            <div class="auth-bg ">
              <span class="absolute top-[-100px] right-[-100px] w-[300px] h-[300px] block rounded-full bg-theme-bg-1 animate-[floating_7s_infinite]"></span>
              <span class="absolute top-[150px] right-[-150px] w-5 h-5 block rounded-full bg-primary-500 animate-[floating_9s_infinite]"></span>
              <span class="absolute left-[-150px] bottom-[150px] w-5 h-5 block rounded-full bg-theme-bg-1 animate-[floating_7s_infinite]"></span>
              <span class="absolute left-[-100px] bottom-[-100px] w-[300px] h-[300px] block rounded-full bg-theme-bg-2 animate-[floating_9s_infinite]"></span>
            </div>
         


            <form method="post">


            <div class="card sm:my-12  w-full shadow-none">
              <div class="card-body !p-10">
                <div class="text-center mb-8">
                  <!-- <a href="#"><img src="../assets/images/logo-dark.svg" alt="img" class="mx-auto auth-logo"/></a> -->

<!-----------------WARNING MSG-------------------------------->
   <?php if (!empty($error)) { ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong style="color: red">Warning! <?php echo $error; ?></strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?> 




                </div>
                <h4 class="text-center font-medium mb-4">Login</h4>
                <div class="mb-3">
                  <input type="email"  class="form-control"  placeholder="Email Address" name="email" />
                </div>
                <div class="mb-4">
                  <input type="password" class="form-control"   placeholder="Password" name="password" />
                </div>
                <div class="flex mt-1 justify-between items-center flex-wrap">
                  <div class="form-check">
                    <input class="form-check-input input-primary" type="checkbox" id="customCheckc1" checked="" />
                    <label class="form-check-label text-muted" for="customCheckc1">Remember me?</label>
                  </div>
                 
                </div>
                <div class="mt-4 text-center">
                  <button type="submit" name="login" class="btn btn-primary mx-auto shadow-2xl">Login</button>
                </div>
                <div class="flex justify-between items-end flex-wrap mt-4">
                  
                  
            </form>
    <!-- [ Main Content ] end -->
    <!-- Required Js -->
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
