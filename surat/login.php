<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="author" content="Codrops" />

        <title>Aplikasi Managemen Surat</title>

        <link rel="shortcut icon" href="images/favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/login.css" />

		<!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
    </head>
    <body>
        <div class="container">
					
			<header>
				<h1><strong>Aplikasi</strong></br> Managemen Surat</h1>
				<h2>"Catatlah ilmu dengan tulisan, karena ilmu itu seperti barang buruan dan mengikatnya dengan mencatatnya."</h2>

				<div class="support-note">
					<span class="note-ie">Sorry, only modern browsers.</span>
				</div>
				
			</header>
			
			<section class="main">
				<form class="form-1" method="post" name="loginAuth">
					<p class="field">
						<input type="text" name="uname" placeholder="nama" required>
						<i class="icon-user icon-large"></i>
					</p>
					<p class="field">
						<input type="password" name="paswd" placeholder="password" required>
						<i class="icon-lock icon-large"></i>
					</p>
					<p class="submit">
						<button type="submit"  name="loginAuth"><i class="icon-arrow-right icon-large"></i></button>
					</p>
				</form>
				
			</section>
        </div>
		<div class="footer">
			<div class="container">
				<center><p class="muted credit">
					AMS V.1.0 -- Copyright &copy;HN 2013
					</p>
				</center>
			</div>
		</div>

		<?php
			ob_start();
			$con=mysqli_connect("localhost","k2459657_tiyo","Tiyo270382","k2459657_sirdb");
			if (mysqli_connect_errno()){
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			
			if (isset($_POST['loginAuth'])) {
				$username=$_POST['uname'];
				$password=$_POST['paswd']; 
				
				// protect sql injection
				$myusername = stripslashes($username);
				$mypassword = stripslashes($password);
				// $myusername = mysqli_real_escape_string($con,$myusername);
				// $mypassword = mysqli_real_escape_string($con,$mypassword);

				$query="SELECT * FROM tbluser WHERE uname='$myusername' and passwd='$mypassword'";
				$result=mysqli_query($con,$query);
		
				// get fullname
				$record = mysqli_fetch_array($result);
				$fname = $record['firstName'];
				$mname = $record['midleName'];
				$lname = $record['lastName'];
				$namaLengkap = $fname." ".$mname." ".$lname;
				
				// echo $query;
				
				// Mysql_num_row is counting table row
				$count=mysqli_num_rows($result);
				// echo $count;
				
				// If result matched $myusername and $mypassword, table row must be 1 row
				if($count==1){
					
					session_start();
					$_SESSION['username'] = $myusername;
					$_SESSION['namaLengkap'] = $namaLengkap;					
					header("location:index.php");
				} else {
					echo "<p><center><i>Nama atau Password Salah</i></p></center>";
				}
			}
		?>
    </body>
	<script src="js/modernizr.custom.63321.js"></script>
</html>