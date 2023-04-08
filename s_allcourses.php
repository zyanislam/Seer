<?php session_start();

include "db_connect.php";

$sid=$_SESSION['student_id'];


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
   
   
<?php 
    
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
                <form action="s_allcourses.php" method="POST" enctype="multipart/form-data">

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
                    
                    <div id="itembox">
                            <select name="select3" class="form-select" id="inputs">
                                <option value="Select">Goal Grade</option>
                                <?php 
                                        $lquery="SELECT * from grade";

                                        $res = mysqli_query($conn,$lquery);

                                        while($row_list= mysqli_fetch_assoc($res)){  
                                ?> 
                                <option  value="<?php echo $row_list['grade']; ?>"><?php echo $row_list['grade']; ?>
                                </option>


                                <?php  
                                }  
                                ?>  
                            </select>  
                          
                        </div> 

                    <div class="ui segment" id="buttondiv">
                        <button type="submit" name="submit" class="ui orange button large" id="buttonbox">Add</button>
                        <span></span>
                        <a class="ui secondary button large" id="buttonbox" onclick="window.location.href = 'home.php';">Go Back</a>
                    </div>
                </form>
            </div>
        </div>
        
        <?php
        if(isset($_POST['submit']))
        {
            $c_name = $_POST['select1'];

            $sgoal = $_POST['select3'];

            $section = $_POST['select2'];
            $s_id = $sid;

            
            $sql5= "SELECT teacher_id FROM t_course where c_name = '$c_name' and section = '$section'";
            $out4 = mysqli_query($conn, $sql5);
            $row=mysqli_fetch_assoc($out4);
            $teacher_id = $row['teacher_id'];

            $sql6 = "SELECT * FROM student where student_id = '$s_id'";
            $out5 = mysqli_query($conn, $sql6);
            $row2=mysqli_fetch_assoc($out5);
            $s_name = $row2['s_name'];



            if($teacher_id != 'NULL'){
                $sql7 = "INSERT INTO marks (student_id, section, s_name, c_name, teacher_id) VALUES('$s_id', '$section', '$s_name', '$c_name', '$teacher_id')";
                $out7 = mysqli_query($conn, $sql7);
                $sql4 = "INSERT INTO course(c_name, section ,student_id,goal, teacher_id) VALUES('$c_name', '$section' ,'$sid','$sgoal', '$teacher_id')";
                $out3 = mysqli_query($conn, $sql4);
                if ($out3 && $out7) {
                    echo '<script>
                    alert("Course Added");
                    window.location = "home.php";
                    </script>';
                }

            else{
                echo '<script>
                alert("Sorry, this course has no faculty member yet!");
                window.location = "s_allcourses.php";
                </script>';
            }
        }
    }
    ?>
        
        <footer class="footer">
            <span id="fspan1">Developed by </span><span id="fspan2">Tres Commas"</span> | 2022 | <span id="fspan1">All Rights Reserved</span>
        </footer>
    </div>
</body>

</html>








<!--

 {
                                        foreach($out2 as $info2){
                            ?>

                            <option value="Select">
                                <php
                                echo "<td>({$info2['c_section']})</td>"; 		                                      
                            ?>

                            </option>

                            <php
                                    }
                                }
                            ?>
   
   echo "<td>({$info['c_id']})</td>"; 
                            echo " ";
				            echo "<td>{$info['c_name']}</td>";
   
   
   
    <table border="2px" align="center" width="50%" height="100%">
        <tr>
            <td>Course</td>
            <td>ID</td>
            <td>Sec</td>
        </tr>
        

    </table>
    
    <form action="" method="post">
        <div class="getsec">
            <select name="" class="form-select">
                <option value="">Select Section</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
            </select>
        </div>
    </form>
-->
