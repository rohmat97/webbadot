<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="css.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<section class="login-block">
    <div class="container">
    <div class="row">
    <div class="col-md-4 login-sec">
        <h2 class="text-center">Sign Up</h2>
<form  action="updates.php" class="login-form"  method="post" name="update">
    <div class="form-group">
    <label for="exampleInputEmail1" class="text-uppercase">Username</label>
    <input type="text" name="username" class="form-control" required>    
    </div>


    <div class="form-group">
        <label class="control-label" for="edu">CATEGORY</label>
        <div class="controls">
            <?php


            $con=mysqli_connect("localhost","root","","db_pdap");
            $sql = "SELECT category FROM tbl_master";
            $result = mysqli_query($con,$sql);

            echo "<select name='jns_pengguna'>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<option value='" . $row['category'] . "'>" . $row['category'] . "</option>";
            }
            echo "</select>";
            ?>
            </select>
        </div>

    </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-uppercase">No Blok Rumah</label>
    <input  type="text" name="no_rumah" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-uppercase">No Hp</label>
      <div class="controls">
          <input  name="no_hp" type="tel" pattern="^\d{4}-\d{4}-\d{4}$" class="form-control" placeholder="xxxx-xxxx-xxxx"   required autofocus><span class="error">* <?p echo $hpErr;?></span>
      </div>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-uppercase">Password</label>
    <input  type="password" name="password" class="form-control" required>
  </div>

    <div class="form-check">
    
    <button name="submit" value="Login" class="btn btn-login float-right">Submit</button>
  </div>
  <br><br>
  <div>Already have an account?</div>
  <a href="login.php">Login</a>

</form>
<div class="copy-text">Created with <i class="fa fa-heart"></i> by <a href="#">Kelompok 3 TEK A2</a></div>
    </div>
    <div class="col-md-8 banner-sec">
                  
  </div>
</div>
</section>
<?php 
?>