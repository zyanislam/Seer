<?php 
session_start();
include "db_connect.php";

$id=$_SESSION['teacher_id'];

$query = "SELECT * from course where teacher_id = $id ";




$result=mysqli_query($conn,$query);


if (isset($_SESSION['teacher_id']) && isset($_SESSION['t_name'])) {
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
    <link rel="stylesheet" href="fonts.css">

</head>


<body id="bodydiv">
   
   
<?php 
		//to connect database to php//
		$host="localhost"; //this is the host name from sql
		$user="root"; //idk what this is
		$pass=""; //for password
		$db="Seer"; //database name from sql
		$data= mysqli_connect($host, $user, $pass, $db);
        $sql = "SELECT * FROM all_courses";
        $sql3 = "SELECT * FROM course";
        $out = mysqli_query ($conn, $sql);



       
    ?>

   
    <div class="pagebody">
        <div class="layout">
        </div>

        <div class="mid">
            <h1 class="text-center" id="h1color" style="margin-top: 0px;">Add Course</h1>

            <div class="container">
                <form action="allcourses.php" method="POST" enctype="multipart/form-data">

                    <div id="itembox">
                        <select name="select1" class="form-select" id="inputs">
                            <option value="<?php echo "{$info['c_name']}" ?>">--Select Course--</option>
                            <?php
		                      while($info = $out->fetch_assoc()) {
	                       ?>
                                <option value="<?php echo "{$info['c_name']}" ?>">
                            <?php
                                    echo "<td>({$info['c_id']})</td>"; 
                                    echo " ";
                                    echo "<td>{$info['c_name']}</td>";
                            ?>
                                </option>
                            <?php
                                }   
                            ?>
                        </select>
                    </div>



                    <div id="itembox">
                        <select name="select2" class="form-select" id="inputs">
                            <option value="Select">--Select Section--</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                                <option value="F">F</option>
                        </select>
                    </div>

                    
                    <div class="ui segment" id="buttondiv">
                        <button type="submit" name="submit" class="ui orange button large" id="buttonbox">Add</button>
                        <span></span>
                        <a class="ui secondary button large" id="buttonbox" onclick="window.location.href = 'tlogin.php';">Go Back</a>
                    </div>
                </form>
            </div>
        </div>
        
        <?php
        if(isset($_POST['submit']))
               {
                   $c_name = $_POST['select1'];

			       $section = $_POST['select2'];
               

                   $sql4 = "INSERT INTO t_course(c_name, section, teacher_id) VALUES('$c_name', '$section', '$id')";
                   

                   $out3 = mysqli_query($conn, $sql4);
                
                if ($out3) 
                    {
                        echo '<script>
                        alert("Course Added");
                        window.location = "tlogin.php";
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
            