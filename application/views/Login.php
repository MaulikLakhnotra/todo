<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <link rel="stylesheet" href="assets/login.css">
    <script src="assets/jquery.slim.min.js"></script>
    <script src="assets/bootstrap.bundle.min.js"></script>
    <script src="assets/sweetalert.min.js"></script>
    <title>Document</title>
</head>
<body>

<div class="flip-container">
    <div class="flipper">
        <div class="front">
            <h2>Sign-In</h2>
            <form action="Home/Log_in" method="post">
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Enter Your Email" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                </div>
                <button type="submit" class="btn btn-primary login_btn">Login</button>
            </form>
            <button type="button" class="btn btn-info signup">Sign-up</button>
        </div>
        <div class="back">
            <h2>Sign-Up</h2>
            <form action="Home/Sign_Up" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="sname" placeholder="Enter Your Name" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="semail" placeholder="Enter Your Email" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="spassword" placeholder="Enter Password" required>
                </div>
                <button type="submit" class="btn btn-primary signup_btn">Sign-Up</button>
            </form>
            <button type="button" class="btn btn-danger goback">Back</button>
        </div>
    </div>
</div>
<?php
    $key = $this->session->flashdata('msg');
    if(!empty($key)){
      if($key == "added") { ?>
        <script>
            swal({
                title: "Data Successfully Inserted",
                icon: "success",
            });
        </script>  
        <?php unset($_SESSION['msg']); } 
      if($key == "wrongpassword") { ?>
      <script>
            swal({
                title: "You have entered wrong password",
                icon: "error",
            });
        </script>
    <?php unset($_SESSION['msg']); } 
    if($key == "wrongemail") { ?>
        <script>
              swal({
                  title: "You are not registered with this email, Please Sign Up",
                  icon: "error",
              });
          </script>
    <?php unset($_SESSION['msg']); } } ?>
        
</body>

</html>

<script>

$('.signup').click(function() {
	$(this).closest('.flip-container').toggleClass('hover');
    $(this).css('transform, rotateY(180deg)');
});

$('.goback').click(function() {
	$(this).closest('.flip-container').toggleClass('hover');
    $(this).css('transform, rotateY(180deg)');
});
</script>