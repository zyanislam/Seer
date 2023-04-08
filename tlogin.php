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
    header('location:tlogin.php');
    die();
}

$id=$_SESSION['teacher_id'];

$query="SELECT * from t_course where teacher_id = $id ";

$result=mysqli_query($conn,$query);


if (isset($_SESSION['teacher_id']) && isset($_SESSION['t_name'])) {

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="tlogin.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

    <title>Welcome Teacher</title>

</head>

<body id="bodydiv">


<nav class="navbar  navbar-expand-lg" id="itemstyle">

        <a class="navbar-brand" id="logoutstyles"s href="#">Teacher</a>
        


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
        <div class="mid">
                                    
                    <div class="c1">
                        <button name="goback" class="ui orange button large" id="buttonbox" onclick="window.location.href = 'allcourses.php';">Add Course</button>
                    </div>
                    
                    <br>
                    
                    <div class="c2">
                    <table border="5px" width="900px" height="100%">
                            <tr>
                                <th>Course</th>
                                <th>Section</th>
                                
                            </tr>

                            <?php
                                while ($info = $result->fetch_assoc()) {
                            ?>
                                <tr>
                                    <?php
                                        echo "<td>{$info['c_name']}</td>";
                                        echo "<td>{$info['section']}</td>";
                                        echo "<td><a class='ui secondary button large' id='mark' href = 'stlist.php?cn={$info['c_name']}'>Mark</a></td>";
                                        $_SESSION['section'] = $info['section'];
                                    ?>
                                </tr>
                            <?php
                                }
                            ?>
                        </table>
                    </div>                             
        </div>
        
    </div>
    <footer class="footer">
        <span id="fspan1">Developed by </span><span id="fspan2">Tres Commas"</span> | 2022 | <span id="fspan1">All Rights Reserved</span>
    </footer>

</body>

</html>

<?php 
}
else{
     header("Location: welcome.php");
     exit();
}
 ?>