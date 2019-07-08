<?php
  require('server.php');
    // If the values are posted, insert them into the database.
    if (isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
  $email = $_POST['email'];
        $password = $_POST['password'];
 
        $query = "INSERT INTO `user` (username, password, email) VALUES ('$username', '$password', '$email')";
        $result = mysqli_query($connection, $query);
        if($result){
            $smsg = "User Created Successfully.";
        }else{
            $fmsg ="User Registration Failed";
        }
    }
    ?>
<html style="background-image: url(../img/latar.jpg)";>
<head>
  <title>Buat Akun</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
 
<div class="container">
   <h2 class="regis"><big>Daftar</big></h2>
      <form class="form-signin" method="POST">
      
      <?php if(isset($smsg)){ ?><div class="alert-success" role="alert"> <span class="closebtn">&times;</span> <?php echo $smsg; ?> </div><?php } ?>
      <?php if(isset($fmsg)){ ?><div class="alert-danger" role="alert"> <span class="closebtn">&times;</span><?php echo $fmsg; ?> </div><?php } ?>
      <script>
var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
    close[i].onclick = function(){
        var div = this.parentElement;
        div.style.opacity = "0";
        setTimeout(function(){ div.style.display = "none"; }, 600);
    }
}
</script>
       <div class="login2"> 
         
           <input type="text" name="username" class="form-control" placeholder="Username" required>
         
          <input type="email" name="email" id="inputEmail" class="form-control" placeholder="xxx@example.com" required autofocus>
         
          <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" title="password min 8" required/>
        <button>Register</button>
        <p class="daftar">sudah punya akun?<a href="login.php"><span>Masuk</span></a></p>
      </div>
    </form>
      </div>
      </form>
</div>
 
</body>
 
</html>