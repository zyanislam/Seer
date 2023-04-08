<?php 
session_start();
include "db_connect.php";

if(isset($_SESSION['LAST_ACTIVE_TIME'])){
    if((time() - $_SESSION['LAST_ACTIVE_TIME']) > 500)
        {
            header('location:logout.php');
            die();
        }
}

$_SESSION['LAST_ACTIVE_TIME'] = time();
if(!isset($_SESSION['IS_LOGIN']))
{
    header('location:home.php');
    die();
}

$id=$_SESSION['student_id'];

$query="SELECT * from course where student_id = '$id' ";

$result=mysqli_query($conn,$query);



if (isset($_SESSION['student_id']) && isset($_SESSION['s_name'])) {

 ?>
<!DOCTYPE html>
<html>
     <head>
     <title>Student Home</title>

     <link rel="stylesheet" href="home.css">


     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
     </head>

<body>

<nav class="navbar  navbar-expand-lg" id="itemstyle">

        <a class="navbar-brand" id="logoutstyle"s href="#">Student</a>
        


        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarToggleExternalContent">

          <ul class="navbar-nav ms-auto">
            
            <li class="nav-item">
              <a class="nav-link" id="logoutstyle" href = 'logout.php'>Logout</a>
            </li>
          </ul>

        </div>
      </nav>
<div class="pagebody">
        <!-- <div class="layout">
            <div class="layoutc1">
    
            </div>
        <div class="layoutc2">

            <button class="ui orange button huge" id="buttonbox" onclick="window.location.href = 'logout.php';">Logout</button>
          

        </div>
            
</div> -->
        <div class="hmid">
            <div class="hmid_top" id="hmid_top">
            
               <div class="hmid_top-l">

                    <h1 class="welcome1">
                       Hello<span class="spanw"><st><?php
                        echo $_SESSION['s_name'];
                       ?></st></span><br>
                       </h1>
                       <h2>Student ID: <span class="spanw2"><?php
                        echo $_SESSION['student_id'];
                       ?></span>
                       </h2>
                       
                    

               </div>
               <div class="hmid_top-r">

               </div>
               
            </div>
            <br>
            <div class="c1">
                        <button class="ui orange button large" id="buttonbox" onclick="window.location.href = 's_allcourses.php';">Enroll Course</button>
            </div>
            <br>    
            <div class="hmid_bot">
                <table class="ui celled table">
                    <thead>
                        <tr><th>Course</th>
                        <th>Section</th>
                        <th>Goal</th>
                    </tr></thead>
                    <tbody>
                    <?php   

                            while($info=$result->fetch_assoc())
                            {
                                ?>
                                <tr>

                                <?php

                                echo"<td>{$info['c_name']}</td>";

                                echo"<td>{$info['section']}</td>";

                                echo"<td>{$info['goal']}</td>";

                                echo"<td><a href='track.php?cn={$info['c_name']}'>Track</a> </td>";

                                ?>

                                </tr>

                            <?php

                            }

                            ?>
                    </tbody>
                </table>
            </div>
        </div>

        <footer class="footer">
        <span id="fspan1">Developed by </span><span id="fspan2">Tres Commas"</span>  | 2022 | <span id="fspan1">All Rights Reserved</span> 
    </footer>
</div>
     
</body>
</html>

<?php 
}
else{
     header("Location: welcome.php");
     exit();
}
 ?>

