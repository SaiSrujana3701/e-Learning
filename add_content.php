<?php include('mysqlconnection.php');?>
<?php 
    if(isset($_SESSION['course']))
    {
        $faculty_id='NULL';
		$course_id=$_SESSION['course'];
    }
?>
<?php 
    if(isset($_SESSION['class']))
    {
        $class_number=$_SESSION['class'];
    }
?>
<?php 
    if(isset($_SESSION['year']))
	{
	    $year_number=$_SESSION['year'];
	}
	if(isset($_SESSION['branch']))
	{
		$course_department_name=$_SESSION['branch'];
	}
?>

<html>
	<head>
		<title>Adding Content</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/form.css">
	</head>
	<body>
		<div class="regform"><h1>Adding Content</h1></div>
		    <div class="main">
			    <form action="" method="POST" enctype="multipart/form-data" >
				    <h2 class="name">Content ID</h2>
				    <input class="Content-ID" type="text" name="content_id" placeholder="Enter the content id">

				    <h2 class="name">Chapter Name</h2>
				    <input class="Chapter-Name" type="text" name="chapter_name" placeholder="Enter the chapter name">

				    <h2 class="name">Content link</h2>
				    <input class="Content-link" type="text" name="content_link" placeholder="Enter the content link">

			    	<h2 class="name">Course ID</h2>
                    <select class="option" name="content_course_id">
                        <option disabled="disabled" selected="selected" value="select">--SELECT OPTION--</option>
                        <?php
                            $sql="SELECT * from course where  course_id='$course_id' and course_department_name='$course_department_name' and course_year_number='$year_number' and course_class_name= '$class_number'";     
                            $res=mysqli_query($conn,$sql) or die(mysqli_error());
                           
                            if($res==TRUE)
                            {
                                $count=mysqli_num_rows($res);
						        if($count>0)
						        {
                                     while($rows=mysqli_fetch_assoc($res))
                                     {
                                        $department_name=$rows['course_id'];
                                        ?>
                                        <option value="<?php echo $department_name;?>"><?php echo $department_name;?></option>
                                        <?php
                                    }
                                }
                            }
                        ?> 
                    </select>

				    <h2 class="name">Class Name</h2>
                    <select class="option" name="content_class_name">
                        <option disabled="disabled" selected="selected" value="select">--SELECT OPTION--</option>
                        <?php
                            $sql="SELECT * from class where class_department_name='$course_department_name' and class_year_number='$year_number'";
                            $res=mysqli_query($conn,$sql) or die(mysqli_error());
                           
                            if($res==TRUE)
                            {
                                $count=mysqli_num_rows($res);
						        if($count>0)
						        {
                                    while($rows=mysqli_fetch_assoc($res))
                                    {
                                        $department_name=$rows['class_name'];
                                        ?>
                                        <option value="<?php echo $department_name;?>"><?php echo $department_name;?></option>
                                        <?php
                                    }
                                }
                            }
                           
                        ?> 
                    </select>

                    <h2 class="name">Year Number</h2>
				    <select class="option" name="content_year_number">
                        <option disabled="disabled" selected="selected" value="select">--SELECT OPTION--</option>
                        <?php
                            $sql="SELECT * from year where year_department_name='$course_department_name' and year_number='$year_number'";
                            $res=mysqli_query($conn,$sql) or die(mysqli_error());
                           
                            if($res==TRUE)
                            {
                                $count=mysqli_num_rows($res);
						        if($count>0)
						        {
                                    while($rows=mysqli_fetch_assoc($res))
                                    {
                                        $department_name=$rows['year_number'];
                                        ?>
                                        <option value="<?php echo $department_name;?>"><?php echo $department_name;?></option>
                                        <?php
                                    }
                                }
                            }
                        ?> 
                    </select>

                    <h2 class="name">Department Name</h2>
                    <select class="option" name="content_department_name">
                        <option disabled="disabled" selected="selected" value="select">--SELECT OPTION--</option>
                        <?php
                            $sql="SELECT * from department where department_name='$course_department_name'";
                            $res=mysqli_query($conn,$sql) or die(mysqli_error());
                           
                            if($res==TRUE)
                            {
                                $count=mysqli_num_rows($res);
						        if($count>0)
						        {
                                    while($rows=mysqli_fetch_assoc($res))
                                    {
                                        $department_name=$rows['department_name'];
                                        ?>
                                        <option value="<?php echo $department_name;?>"><?php echo $department_name;?></option>
                                        <?php
                                    }
                                }
                            }
                        ?> 
                    </select>

                    <h2 class="name">Add content</h2>
                    <input class="Add-content" type="file" name="content_file">

                    <button type="submit" name="submit" class="btn-secondary">Add Content</button>
			    </form>
		    </div>
	    </body>
        <?php 
        if(isset($_POST['submit']))
        { 
            //get data from for
            $content_id=$_POST['content_id'];
            $chapter_name=$_POST['chapter_name'];
            $content_link=$_POST['content_link'];
            $content_course_id=$_POST['content_course_id'];
            $content_class_name=$_POST['content_class_name'];
            $content_year_number=$_POST['content_year_number'];
            $content_department_name=$_POST['content_department_name'];

            if(isset($_FILES['content_file']['name']))
            {
                $content_file=$_FILES['content_file']['name'];
                $source_path=$_FILES['content_file']['tmp_name'];
                $destination_path="../files/".$content_file;

                $upload=move_uploaded_file($source_path,$destination_path);                                                                                                 
                if($upload == FALSE)
                {
                    $_SESSION['upload']="upload failed";
                }
            }
            $db_select=mysqli_select_db($conn,'mini-project') or die(mysqli_error());
            $sql = "INSERT INTO content (content_id,chapter_name,content_link,content_course_id,content_class_name,content_year_number, content_department_name, content_file)
                            VALUES ('$content_id','$chapter_name','$content_link','$content_course_id','$content_class_name','$content_year_number','$content_department_name', '$content_file')";
    
            $res=mysqli_query($conn,$sql)or die(mysqli_error());
            if($res == TRUE)
            {
                $_SESSION['inserted']='content added Successfully';
                header("location:".SITEURL.'student/content.php');
                die();
            }
        }
    ?>  
</html>