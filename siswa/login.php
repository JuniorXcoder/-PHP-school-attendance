<?php
$koneksi = new mysqli ("localhost", "id8349832_db_test", "admin", "id8349832_db_test");
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
       <link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>
<body>
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <h2> Halaman Login Siswa</h2>
                 <br />
            </div>
        </div>
         <div class="row ">
               
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>   Masukan Username Dan Password </strong>  
                            </div>
                            <div class="panel-body">
                                <form action="" method="post" name="login">
                                          <?php if(isset($fmsg)){ ?><div class="gagal" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>    
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" name="username" class="form-control" placeholder="Username" required />
                                     </div>
                                     <div class="form-group input-group">
                                             <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                             <input type="password" name="password" class="form-control" placeholder="Password" required />
                                     </div>
                                    <input name="submit" type="submit" class="btn btn-primary" value="Login" />
                                    <a name="button" type="button" class="btn btn-primary" style="margin-left: 180px; max-width: 100%; max-height: 100%;" href= "/homeboot">Menu</a>
                                </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>


     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php
$submit = isset($_POST['submit']);
if ($submit) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $koneksi->query("SELECT * FROM `user` WHERE `username`='$username' AND `password`='".md5($password)."' AND `level`='siswa'");
    $data = $query->fetch_assoc();
    $row = mysqli_num_rows($query);
    if ($row == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['kelas'] = $data['kelas'];
        $_SESSION['level'] = $data['level'];
         header("Location: index.php?page=beranda");
    }else{
?><script type="text/javascript">
alert("Username Atau Password Salah!");
</script><?php
    }
    }else{}
?>