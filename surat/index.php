<?php
	ob_start();
	session_start();
	$_SESSION['username'];
	if(!isset($_SESSION['username'])) {
	header("location:login.php");
}
?>
<!DOCTYPE html > 
<html lang="id"> 
	<head> 
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">  
		<meta name="description" content="Twitter Bootstrap Basic Tab Based Navigation Example">

		<title>Aplikasi Managemen Surat</title>
		
        <link rel="shortcut icon" href="images/favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css" > 
		<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" >
		<link rel="stylesheet" type="text/css" href="css/datepicker.css" > 
		<link rel="stylesheet" type="text/css" href="css/blue.css" >
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Port+Lligat+Slab">
			
	</head>

	<body>
		<!-- We will create navbar here -->
		<div class="navbar navbar-fixed-top">  
			<div class="navbar-inner">  
				<div class="container">  
				<!--navigation does here-->  
					<ul class="nav">  
						<li class="active"><a class="brand" href="index.php">Aplikasi Manajemen Surat</a></li>  
						<li><a href="#show">Lihat</a></li>  
						<li><a href="#input">Tambah</a></li>  
						<li><a href="logout.php">Keluar</a></li> 						
					</ul>  
				</div>  
			</div>  
		</div>

		<div class="container">
			<?php
				// $page = (isset($_GET['page']))? $_GET['page'] : "main";
				// switch ($page) {
					// case 'show': include "show.php"; break;
					// case 'inputForm': include "inputForm.php"; break;	
				// }
			?>	
			
			<section id="input" style="padding-top: 30px; padding-bottom: 10px;">
				<?php
					require ("inputForm.php");
				?>
			</section>
			<section id="show" style="padding-top: 60px; padding-bottom: 100px;">
				<?php
					require ("show.php");
				?>
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

		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
		<script type="text/javascript" src="js/bootstrap.min.js"></script>  
		<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
		<script type="text/javascript" src="js/locales/bootstrap-datepicker.id.js"></script>	
		<script type="text/javascript" src="js/jquery.tablesorter.min.js"></script>
		<script type="text/javascript" src="js/jquery.tablesorter.widgets.min.js"></script>
		
		<!-- START
			get datepicker 
			- datepicker.css
			- bootstrap-datepicker.js
			- bootstrap-datepicker.id.js
		-->
		<script>
			$('#tglSurat').datepicker({
			format: 'dd/mm/yyyy',
			language: 'id',
			});
		</script>
		<!-- END -->
		
		
		
		<!-- START
			resizeable coloumn 
			 - jquery.tablesorter.widgets.min.js
			 - jquery.tablesorter.min.js
			 - blue.css
		 -->
		<script>
			$(function() {
			  $("table:first").tablesorter({
				theme : 'blue',
				// initialize zebra striping and resizable widgets on the table
				widgets: [ "zebra", "resizable" ],
				widgetOptions: {
				  resizable_addLastColumn : true
				}
			  });

			  $("table:last").tablesorter({
				theme : 'blue',
				// initialize zebra striping and resizable widgets on the table
				widgets: [ "zebra", "resizable" ]
			  });

			  // $(document).ready(function() { 
				// $("table") 
				// .tablesorter({widthFixed: true, widgets: ['zebra']}) 
				// .tablesorterPager({container: $("#pager")}); 
			  // }); 
			});
		</script>	
		<!-- END -->		
		<?php
		ob_flush();	
		?>
	</body>
</html> 