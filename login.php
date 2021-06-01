<?php  include('mysqlconnection.php');?>
<?php 
   	if(isset($_SESSION['login']))
	{
		echo $_SESSION['login'];
		unset($_SESSION['login']);
	}
	?>
	<?php 
		if(isset($_SESSION['no-login-messege']))
		{
			echo $_SESSION['no-login-messege'];
			unset($_SESSION['no-login-messege']);
		}
	?>
<html>
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/login1.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" 
	rel="stylesheet"> 
</head>
<body>
	<div class="cont">
		<div class="form sign-in">
			<form id="login" method="POST">
		   		<table>
					<h2>Student Login</h2>
					<label>
						<span>Email Address</span>
						<input type="email" name="email">
					</label>
					<label>
						<span>Password</span>
						<input type="password" name="password">
					</label>
					<input type="submit" name="submit"  class="submit" value="L0GIN">
				</table>
   			</form>
			<div class="social-media">
				<ul>
					<li><img src="imgs/gl.png"></li>
					<li><img src="imgs/rguktb1.jpg"></li>
				</ul>
			</div>
		</div>
		<div class="sub-cont">
			<div class="img">
				<div class="img-text m-up">
					<h2>Faculty Login</h2>
					<p>Login as a Faculty</p>
				</div>
				<div class="img-text m-in">
					<h2>Student Login</h2>
					<p>Login as a Student</p>
				</div>
				<div class="img-btn">
					<span class="m-up">LOGIN</span>
					<span class="m-in">LOGIN</span>
				</div>
			</div>
			<div class="form sign-up">
				<form id="login" method="POST">
					<table>
						<h2>Faculty Login</h2>
						<label>
							<span>Faculty ID</span>
							<input type="text" name="email1">
						</label>
						<label>
							<span>Password</span>
							<input type="Password" name="password1">
						</label>
						<input type="submit" name="submit1"  class="submit" value="login">
					</table>
   				</form>
				<div class="social-media">
					<ul>
						<li><img src="imgs/gl.png"></li>
						<li><img src="imgs/rguktb1.jpg"></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="js/login1.js"></script>
</body>
</html>
		   
<?php
    if(isset($_POST["submit"]))
    { 
		//get data from form
        $student_id=$_POST['email'];
        $student_password=md5($_POST['password']);
		$sql="SELECT * from student where student_mail='$student_id' and student_password='$student_password'";
					
		$res=mysqli_query($conn,$sql) or die(mysqli_error());
		if($res==TRUE)
		{
			$count=mysqli_num_rows($res);
			if($count==1)
			{
				$_SESSION['login']='login Successfully';
				$_SESSION['faculty']=$student_id;
            	header("location:".SITEURL.'student/department.php');
            }
			else
			{
				$_SESSION['login']="login fail";
				header("location:".SITEURL.'student/login.php');
			}
        }
    }
	if(isset($_POST["submit1"]))
    { 
		//get data from form
        $student_id1=$_POST['email1'];
        $student_password1=md5($_POST['password1']);
		$sql="SELECT * from faculty where faculty_id='$student_id1' and faculty_password='$student_password1'";
					
		$res=mysqli_query($conn,$sql) or die(mysqli_error());
		if($res==TRUE)
		{
			$count=mysqli_num_rows($res);
			if($count==1)
			{
				$_SESSION['login']='login Successfully';
				$_SESSION['faculty']=$student_id1;
            	header("location:".SITEURL.'student/Department.php');
            }
			else
			{
				$_SESSION['login']="login fail";
				header("location:".SITEURL.'student/login.php');
			}
        }
    }   
?>        
