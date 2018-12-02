<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="css.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->




<?php      
 session_start(); 
include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

        $sql="SELECT * FROM tbl_pengguna WHERE BINARY username='".$username."' AND password='".$password."'";
        $result=mysqli_query($con,$sql);
        $cek = mysqli_num_rows($result);


        if ($cek !=0 )
          {
            $_SESSION['username'] = $username;
        header("Location: index.php");
          }else{
            echo "<script type='text/javascript'>alert('login failed! Try Again!')</script>";
            ?>
            <section class="login-block">
    <div class="container">
  <div class="row">
    <div class="col-md-4 login-sec">
        <h2 class="text-center">Login Now</h2>
<form  action="" class="login-form"  method="post" name="validasi">
  <div class="form-group">
    <label for="exampleInputEmail1" class="text-uppercase">Username</label>
    <input type="text" name="username" class="form-control" required>    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-uppercase">Password</label>
    <input  type="password" name="password" class="form-control" required>
  </div>

    <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input">
      <small>Remember Me</small>
    </label>
    <button name="submit" value="Login" class="btn btn-login float-right">Submit</button>
  </div>
  <br><br>
  <div>Don't have an account?</div>
  <a href="daftar.php">Sign Up</a>
  
</form>
<div class="copy-text">Created with <i class="fa fa-heart"></i> by <a href="#">Kelompok 3 TEK A2</a></div>
    </div>
    <div class="col-md-8 banner-sec">
                  
  </div>
</div>
</section>
<?php }
?>