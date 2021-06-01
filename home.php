<?php include("mysqlconnection.php") ?>
<html>
<head>
	<title>Homepage</title>
	<link rel="stylesheet" type="text/css" href="css/home.css?v=<?php echo time();?>">
</head>
<body>
	<div class="menu-bar">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="<?PHP echo SITEURL;?>student/about.php">About us</a><i class="fa fa-user"></i></li>
			<li><a href="<?PHP echo SITEURL;?>student/login.php">Login</a>
			<li><a href="<?PHP echo SITEURL;?>student/g1.php">Gallery</a></li>
			<li><a href="<?PHP echo SITEURL;?>student/contact.php" >Contact</a></li>
			<li><a href="<?PHP echo SITEURL;?>student/logout.php" >Logout</a></li>
		</ul>
	</div>
	<div class="slider">
			<div class="slides">
				<input type="radio" name="radio-btn" id="radio1">
				<input type="radio" name="radio-btn" id="radio2">
				<input type="radio" name="radio-btn" id="radio3">
				<input type="radio" name="radio-btn" id="radio4">
				<input type="radio" name="radio-btn" id="radio5">
				<input type="radio" name="radio-btn" id="radio6">
				<input type="radio" name="radio-btn" id="radio7">

				<div class="slide first">
					<img src="imgs/campus3.jpg" alt=""></a>
				</div>
				<div class="slide">
					<img src="imgs/campus4.jpg" alt=""></a>
				</div>
				<div class="slide">
					<img src="imgs/campus5.jpg" alt=""></a>
				</div>
				<div class="slide">
					<img src="imgs/campus6.jpg" alt=""></a>
				</div>
				<div class="slide">
					<img src="imgs/campus7.jpg" alt=""></a>
				</div>
				<div class="slide">
					<img src="imgs/campus8.jpg" alt=""></a>
				</div>
				<div class="slide">
					<img src="imgs/campus2.jpg" alt=""></a>
				</div>

				<div class="navigation-auto">
					<div class="auto-btn1"></div>
					<div class="auto-btn2"></div>
					<div class="auto-btn3"></div>
					<div class="auto-btn4"></div>
					<div class="auto-btn5"></div>
					<div class="auto-btn6"></div>
					<div class="auto-btn7"></div>
				</div>
			</div>
			<div class="navigation-manual">
				<label for="radio1" class="manual-btn"></label>
				<label for="radio2" class="manual-btn"></label>
				<label for="radio3" class="manual-btn"></label>
				<label for="radio4" class="manual-btn"></label>
				<label for="radio5" class="manual-btn"></label>
				<label for="radio6" class="manual-btn"></label>
				<label for="radio7" class="manual-btn"></label>
			</div>
		</div>
		<script type="text/javascript">
			var counter=1;
			setInterval(function(){
				document.getElementById('radio'+counter).checked=true;
				counter++;
				if(counter>7){
					counter=1;
				}
			},5000);
		</script>
</body>
<link rel="stylesheet" type="text/css" href="css/footer.css?v=<?php echo time();?>">
<footer class="site-footer">
      <div class="container">
        <div class="row">
			<div class="column">
          <div class="col-sm-12 col-md-6">
            <h6>About</h6>
            <p class="text-justify">RGUKT <i>Rajiv Gandhi University of Knowledge Technologies </i> --Catering to the Educational Needs of Gifted Rural Youth of Telangana is unique university which actively uses Information and Communication Technology (ICT) in teaching. It is perhaps the first of its kind in the country with an educational model that is intensely ICT based. Established by the Government of erstwhile Andhra Pradesh vide a special act of legislation, this campus is loacated at the holy land of Basar (the abode of Gnyana Saraswathi, Goddess of knowledge) in Nirmal District (Telangana State). The campus is set in about 272 acres of salubrious and serene surrounding just a short distance from the banks of river Godavari.</p>  
		  </div>
		</div>
		
		<div class="column">
          <div class="col-xs-6 col-md-3">
            <h6>Quick Links</h6>
            <ul class="footer-links">
              <li><a href="<?PHP echo SITEURL;?>student/about.php">About Us</a></li>
              <li><a href="<?PHP echo SITEURL;?>student/contact.php">Contact Us</a></li>
              <li><a href="<?PHP echo SITEURL;?>student/images.php">Images</a></li>
              <li><a href="<?PHP echo SITEURL;?>student/login.php">Login</a></li>
            </ul>
          </div>
        
        <hr>
		
		</div>
		</div>
      
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2021 All Rights Reserved by 
         <a href="#">RGUKT</a>.
            </p>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
        
          </div>
        </div>
      </div>
</footer>
</html>