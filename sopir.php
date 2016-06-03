<?php  
  session_start();
?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <!-- Custom CSS -->
    <link href="css/freelancer.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  </head>


  <body style="background-color:#00CC99">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		  <a class="navbar-brand" href="index.html" style="font-size:40pt">Home</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="pesantiket.html">Pesan Tiket</a>
            </li>
            <li>
              <a href="petugasloket.php">Petugas Loket</a>
            </li>
			<li>
              <a href="sopir.php">Supir</a>
            </li>
			<li>
              <a href="konsumen.php">Konsumen</a>
            </li>
		  </ul>
        </div>
      <!-- /.navbar-collapse -->
      </div>
    <!-- /.container-fluid -->
    </nav>
  
    <div id="login" style="margin-top:150px;">
      <form name='form-login' method="post" action="sopir.php">
	      <div class="log">SIGN IN</div><br>
		    <div class="form-group">
	        <label>Username</label><br>
          <span class="fontawesome-user"></span>
		      <input type="email" id="user" name="email" placeholder="Enter Username" required="required">
		      <label>Password</label><br>
          <span class="fontawesome-lock"></span>
          <input type="password" id"pass" name="pass" placeholder="Enter Password" required="required">
          <button type="submit">Login</button><br>
		</div>
	  </form>
	</div>   


	<?php
      if(isset($_POST['email'])){
          
        require_once 'koneksi.php';
          
        $email = $_POST['email'];
        $pass =  md5($_POST['pass']);
      
        $sql = "SELECT * FROM user WHERE email='$email' AND Password='$pass' LIMIT 1";
                
        $hasil = $db->query($sql);
                
        if($hasil->num_rows > 0){
          $_SESSION['email'] = $email;
          echo 'Email atau Password Anda Benar';
        //header("location:dashboard.php");
        header("location:index.html");
        }else{
          echo 'Email atau Password Anda salah';
        }
      }
    ?>
	
	
  </body>
</html>
