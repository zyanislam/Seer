<?php 
session_start();
include "db_connect.php";

$id=$_SESSION['admin_id'];

$query="SELECT * from all_courses";


$result=mysqli_query($conn,$query);


if (isset($_SESSION['admin_id']) && isset($_SESSION['ad_name'])) {
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ALL COURSES</title>
    <link rel="stylesheet" href="tlogin.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

</head>


<body id="bodydiv">
   
    <div class="pagebody">
        <div class="layout">
        </div>

        <div class="mid">
            <h1 class="text-center" id="h1color" style="margin-top: 0px;">Add A New Course</h1>

            <div class="container">
                <form action="admincourses.php" method="POST" enctype="multipart/form-data">

                    <div>
                        <input type="text" class="form-control" id="inputs" name="course_name" placeholder="Course Name">
                    </div>

                    <div>
                        <input type="text" class="form-control" id="inputs" name="course_id" placeholder="Course ID">
                    </div>
                    
                    <div class="ui segment" id="buttondiv">
                        <button type="submit" name="submit" class="ui orange button large" id="buttonbox">Add</button>
                        <span></span>
                        <a class="ui secondary button large" id="buttonbox" onclick="window.location.href = 'admin.php';">Go Back</a>
                    </div>
                </form>
            </div>
        </div>
        
        <?php
        if(isset($_POST['submit']))
               {
                   $c_name = $_POST['course_name'];

                   $courseid = $_POST['course_id'];

                   $sql4 = "INSERT INTO all_courses(c_name, c_id) VALUES('$c_name', '$courseid')";

                   $out3 = mysqli_query($conn, $sql4);
                
                if ($out3) 
                    {
                        echo '<script>
                        alert("Course Added");
                        window.location = "admin.php";
                        </script>';
                    }
                else
                    {
                        echo "Failed";
                    }
               }
        ?>
        
        <footer class="footer">
            <span id="fspan1">Developed by </span><span id="fspan2">Tres Commas"</span> | 2022 | <span id="fspan1">All Rights Reserved</span>
        </footer>
    </div>
</body>

</html>
<?php
}
?>
            