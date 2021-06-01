<link rel="stylesheet" type="text/css" href="css/home.css?v=<?php echo time();?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" 
	  integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" 
	  crossorigin="anonymous" 
	  referrerpolicy="no-referrer" />
<?php include('mysqlconnection.php');?>
<?php include('logoutcheck.php');?>

<div class="menu-bar">
	<ul>
		<button class="social-icon"><i class="fas fa-reply"></i></button>
		<li><a href="#">Home</a></li>
		<li><a href="<?PHP echo SITEURL;?>student/about.php">About us</a></i></li>
		<li><a href="<?PHP echo SITEURL;?>student/about.php">Departments</a></li>
		<li><a href="<?PHP echo SITEURL;?>student/login.php">Login</a>
		<li><a href="<?PHP echo SITEURL;?>student/g1.php">Gallery</a></li>
		<li><a href="<?PHP echo SITEURL;?>student/contact.php" >Contact</a></li>
		<li><a href="<?PHP echo SITEURL;?>student/logout.php" >Logout</a></li>
	</ul>
</div>