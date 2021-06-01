<?php include('menu.php');?>
<?php
    if(isset($_GET['course_id']))  //GETTING THE COURSE ID FROM PREVIOUS PAGE
    {
        $course_id=$_GET['course_id'];
        $faculty_id='NULL';
		$_SESSION['course']=$course_id;
    }
?>
<?php
    if(isset($_SESSION['class']))
    {    
        $class_number=$_SESSION['class'];
    }
?>
<?php 
    if(isset($_SESSION['course']))
    {    
        $course_id=$_SESSION['course'];
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
	<title>CONTENT</title>
	<link rel="stylesheet" type="text/css" href="css/content.css?v=<?php echo time();?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" 
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" 
    crossorigin="anonymous" 
    referrerpolicy="no-referrer" />
	<meta charset="UTF-8">
</head>
<body>
<?php
    $sql="SELECT * from course where course_id='$course_id'";
    $res=mysqli_query($conn,$sql) or die(mysqli_error());
    if($res==TRUE)
    {
        $count2=mysqli_num_rows($res);
        if($count2>0)
        {
            while($rows2=mysqli_fetch_assoc($res))
            {
                $faculty_id=$rows2['course_faculty_id'];
            }
        }
    }
    if($_SESSION['faculty']==$faculty_id)
    {
        ?>
        <a href="add_content.php"><h1>Add Content</h1></a>
        <?php
    }
    ?>
	<div class="middle">
		<div class="menu">		
            <?php
                $sql2="SELECT distinct(chapter_name) from content where content_course_id='$course_id' and 
                content_class_name ='$class_number' and content_year_number='$year_number' and content_department_name='$course_department_name' ";
                $res1=mysqli_query($conn,$sql2) or die(mysqli_error());
                if($res1==TRUE)
                {
                    $count=mysqli_num_rows($res1);
                    if($count>0)
                    {
                        while($rows=mysqli_fetch_assoc($res1))
                        {
                            $chapter_name=$rows['chapter_name'];
                            ?>
                            <li class="item" id="<?php echo $chapter_name ?>">
				                <a href="#<?php echo $chapter_name ?>" class="btn"><?php echo $chapter_name ?><i class="fas fa-chevron-down"></i></a>
				                <?php
                                $sql1="SELECT * from content where content_course_id='$course_id' and content_class_name ='$class_number' and 
                                content_year_number='$year_number' and content_department_name='$course_department_name' and 
                                chapter_name='$chapter_name' ";
                                $res2=mysqli_query($conn,$sql1) or die(mysqli_error());
                                if($res2==TRUE)
                                {
                                    $count1=mysqli_num_rows($res1);
                                    if($count1>0)
                                    {
                                        while($rows1=mysqli_fetch_assoc($res2))
                                        {
                                            $content_link=$rows1['content_link'];
                                            $_content_file=$rows1['content_file'];
                                            ?>
                                            <div class="smenu">
					                            <a href="<?php echo $content_link ?>"target='blank'><?php echo $content_link ?></a>
                                                <a href="<?php echo SITEURL ; ?>files/<?php echo $_content_file ?>"target='blank'><?php echo $_content_file ?></a>
                                                <?php
                                        }
                                    }
                                }
                                ?>
                                </div>
			                </li>
                            <?php
                        }
                    }
                }
                ?>
            </div>
            <div class="img-col">
                <img src="imgs/content.jpeg" height=500px alt="classes">
            </div>
        </div>
        <script src="js/back.js"></script>
    </body>    
</html> 