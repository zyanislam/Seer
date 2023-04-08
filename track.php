<?php 
session_start();
include "db_connect.php";



$id=$_SESSION['student_id'];

$cname = $_GET['cn'];


$query="SELECT * from course where student_id = '$id' and c_name='$cname' ";

$result=mysqli_query($conn,$query);

$row = mysqli_fetch_assoc($result);

$section=$row['section'];

$query1="SELECT teacher.t_name from t_course join teacher on t_course.teacher_id=teacher.teacher_id where section = '$section' and c_name='$cname'";

$query2="SELECT goal from course where student_id = '$id' and c_name='$cname' ";

$query4="SELECT * from marks where student_id = '$id' and c_name='$cname' ";





$result1=mysqli_query($conn,$query1);

$result2=mysqli_query($conn,$query2);

$result4=mysqli_query($conn,$query4);




$row1 = mysqli_fetch_assoc($result1);

$row2 = mysqli_fetch_assoc($result2);

$row4 = mysqli_fetch_assoc($result4);


$sgoal = $row2['goal'];

?>


<!DOCTYPE html>
<html>
     <head>
     <title>Track</title>

     <link rel="stylesheet" href="track.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
     crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">




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
              <a class="nav-link" id="logoutstyle" onclick="window.location.href = 'home.php';">Back</a>
            </li>
          </ul>

        </div>
      </nav>
<div class="top">
        
        <div class="hmid">
            <div class="hmid_top">
            
               <div class="hmid_top-l">
                    <h2 class="welcome2">
                       Course:<?php
                        echo $row['c_name'];
                       ?><br>
                       Section:
                       <?php
                        echo $row['section'];
                       ?><br>
                       Faculty:
                       <?php
                        echo $row1['t_name'];
                       ?> 
                    </h1>
                </div>

               <div class="hmid_top-r">
                    <div class="hmid_top-rl">
                        <h1>Goal grade: <span><?php echo $sgoal; ?></span></h1>
                        <?php if($sgoal == 'A'){
                            ?>
                            <h3>Minimum Ct marks needed: 18</h3>
                            <br>
                            <h3>Minimum Mid marks needed: 26</h3>
                            <br>
                            <h3>Minimum Final marks needed: 36</h3>

                            <?php
                            $mygrademarks = 90;
                        }

                        ?>

                        <?php if($sgoal == 'A-'){
                            ?>
                            <h3>Minimum Ct marks needed: 15</h3>
                            <br>
                            <h3>Minimum Mid marks needed: 25</h3>
                            <br>
                            <h3>Minimum Final marks needed: 36</h3>

                            <?php
                            $mygrademarks = 86;
                        }

                        ?>

                        <?php if($sgoal == 'B+'){
                            ?>
                            <h3>Minimum Ct marks needed: 14</h3>
                            <br>
                            <h3>Minimum Mid marks needed: 24</h3>
                            <br>
                            <h3>Minimum Final marks needed: 34</h3> 

                            <?php
                            $mygrademarks = 82;
                        }

                        ?>

                        <?php if($sgoal == 'B'){
                            ?>
                            <h3>Minimum Ct marks needed: 12</h3>
                            <br>
                            <h3>Minimum Mid marks needed: 23</h3>
                            <br>
                            <h3>Minimum Final marks needed: 33</h3>

                            <?php
                            $mygrademarks = 78;
                        }

                        

                        ?>  

                    </div>
                    <div class="hmid_top-rr">
                            <?php

                                $query3="SELECT g_mark from grade where grade = '$sgoal'";
                            
                                $result3=mysqli_query($conn,$query3);

                                $row3=mysqli_fetch_assoc($result3);

                                $smark = $row3['g_mark'];

                                $mid=$row4['mid'];

                                $final=$row4['final'];

                                $count = 0;

                                if( $row4['ct1'] == NULL && $row4['ct2'] == NULL && $row4['ct3'] == NULL && $row4['ct4'] == NULL && $row4['ct5'] == NULL){
                                echo '<script>
                                alert("Sorry! No CT marks have be updated yet");
                                window.location = "home.php";
                                </script>';
                                }

                                else if( $row4['ct1'] != NULL && $row4['ct2'] == NULL && $row4['ct3'] == NULL && $row4['ct4'] == NULL && $row4['ct5'] == NULL){
                                    $ct1=$row4['ct1'];
            
                                    $ctavg = ($ct1);
            
                                    $ctper = ($ctavg/20)*100;
            
                                    $a = array($ct1);
                                
                                    arsort($a);

                                    $count = 1;
                                }
            
                                else if( $row4['ct1'] != NULL && $row4['ct2'] != NULL && $row4['ct3'] == NULL && $row4['ct4'] == NULL && $row4['ct5'] == NULL){
                                    $ct1=$row4['ct1'];
                                    $ct2=$row4['ct2'];

                                    $a = array($ct1, $ct2);
                                
                                    arsort($a);
            
                                    $ctavg = (($ct1 + $ct2)/2);
            
                                    $ctper = ($ctavg/20)*100;
            
                                    $count = 2;
                                }
            
                                else if( $row4['ct1'] != NULL && $row4['ct2'] != NULL && $row4['ct3'] != NULL && $row4['ct4'] == NULL && $row4['ct5'] == NULL){
                                    $ct1=$row4['ct1'];
                                    $ct2=$row4['ct2'];
                                    $ct3=$row4['ct3'];

                                    $a = array($ct1, $ct2, $ct3);
                                
                                    arsort($a);

                                    $topmarks = array_slice($a, -5);
                                
                                
            
                                    $sum = 0;
                
                                    for ($i=0; $i <3; $i++){
                
                                        $sum+= $topmarks[$i];
                
                
                
                                    }

                                    $ctavg = (($sum)/3);
            
                                    $ctper = ($ctavg/20)*100;
            
                                    $count = 3;
                                }
            
                                else if( $row4['ct1'] != NULL && $row4['ct2'] != NULL && $row4['ct3'] != NULL && $row4['ct4'] != NULL && $row4['ct5'] == NULL){
                                    $ct1=$row4['ct1'];
                                    $ct2=$row4['ct2'];
                                    $ct3=$row4['ct3'];
                                    $ct4=$row4['ct4'];
                                    
                                    $a = array($ct1, $ct2, $ct3, $ct4);

                                    arsort($a);

                                    $topmarks = array_slice($a, -5);
                                
                                
            
                                    $sum = 0;
                
                                    for ($i=0; $i <3; $i++){
                
                                        $sum+= $topmarks[$i];
                
                
                
                                    }


                                    $ctavg = ($sum/3);
            
                                    $ctper = ($ctavg/20)*100;
            
                                
                                
                                    $count = 4;
                                }
            
                                else if( $row4['ct1'] != NULL && $row4['ct2'] != NULL && $row4['ct3'] != NULL && $row4['ct4'] != NULL && $row4['ct5'] != NULL){
                                    $ct1=$row4['ct1'];
                                    $ct2=$row4['ct2'];
                                    $ct3=$row4['ct3'];
                                    $ct4=$row4['ct4'];
                                    $ct5=$row4['ct5'];
            
                                    $a = array($ct1, $ct2, $ct3, $ct4, $ct5);

                                    arsort($a);

                                    $topmarks = array_slice($a, -5);
                                
                                
            
                                    $sum = 0;
                
                                    for ($i=0; $i <3; $i++){
                
                                        $sum+= $topmarks[$i];
                
                
                
                                    }


                                    $ctavg = ($sum/3);
            
            
                                    
            
                                    $ctper = ($ctavg/20)*100;
                            
            
                                    
                                    $count = 5;
                    
                                    
                                }
            
                                
            
                                $topmarks = array_slice($a, -5);
                                
                                
            
                                $sum = 0;
            
                                for ($i=0; $i <3; $i++){
            
                                    $sum+= $topmarks[$i];
            
            
            
                                }

                                $ctconvert= ($sum/60)*20;

                                $ctconv= round($ctconvert);





            
                                if( $row4['mid'] != NULL && $row4['final'] != NULL){

                                    
                                    $mymarks = $mid+$final+$ctconv;
                                    $mymarksper = ($mymarks/90)*100;

                                    $m_left=$smark-($mid+$final+$ctconv);    

                                }

                                elseif( $row4['mid'] != NULL && $row4['final'] == NULL){

                                    $mymarks = $mid+$ctconv;

                                    $mymarksper = ($mymarks/90)*100;


                                    $m_left=$smark-($mid+$ctconv);



                                }

                                elseif( $row4['mid'] == NULL && $row4['final'] == NULL){

                                    $mymarks = $ctconv;
                                    $mymarksper = ($mymarks/90)*100;


                                    $m_left=$smark-($ctconv);

                                }

                            ?>


                                <h1>Marks left: <span><?php echo $m_left; ?></span></h1>
                            

                        </div>
               </div>
               
            </div>
               
            
        </div>
        <br>
        <br>

        <div class="hmid_bot2" >
            
                        <h1>Scenarios:</h1>

                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            
                    
                            <div class="carousel-inner" align="center">
                                
                                

                                <?php

                                if($sgoal == 'A'){
                                    $min_ct = 18;
                                    
                                    $c=0;
                                    ?>
                                    <div class="carousel-item active" id="citems">
                                    <h3>According to set Goal grade, the minimum required marks in every class tests is: <?php echo $min_ct;  ?>.<br>
                                    The timeline for achieved marks is viewable here events. Click right or left to view.
                                    </h3>
                                    </div>
                                    <?php
                                        $c=1;
                                        for($i=0;$i<$count;$i++){
                                            
                                            $ctleft=($count-($i))-1;
                                            
                                            $diff;
                                            

                                        if($a[$i]>=$min_ct)
                                          {

                                              $rra[$i]=$a[$i];

                                              $gr=3-sizeof($rra);

                                              $diff=$a[$i]-$min_ct;

                                              

                                              
                                                
                                        ?>
                                        
                                            <div class="carousel-item" id="ctems">
                                                <h2 >Class test:<?php echo $i+1;?></h2>
                                                <h3>Marks achieved: <?php echo $a[$i]; ?>. Satisfactory!.Get the same or better marks in <?php echo $gr; ?> more class tests. </h3>
                                                <h3><?php echo $ctleft; ?> CT left! </h3>
                                            </div>
                                            

                                        
                                                
                                <?php       
                                                $c++;
                                                
                                        }

                                        else if($a[$i]>=$min_ct-2 && $a[$i]<$min_ct){


                                            $diff2=$min_ct-$a[$i];
                                            
                                            ?>

                                            <div class="carousel-item" id="ctems">
                                                <h2 >Class test:<?php echo $i+1; ?></h2>
                                                <h3>Marks achieved: <?php echo $a[$i]; ?>. Still Salvagable.  Make up for <?php echo $diff2; ?> marks in any next best class tests or Midterms and Finals. </h3>
                                                <h3><?php echo $ctleft; ?> CT left! </h3>
                                            </div>

                                            
                                            <?php
                                            $c++;
                                        
                                        }
                                        else{
                                            ?>

                                            <div class="carousel-item" id="ctems">
                                                <h2 >Class test:<?php echo $i+1; ?></h2>
                                                <h3>Marks achieved: <?php echo $a[$i]; ?>. Not suitable to reach current grade. Do better in next class tests </h3>
                                                <h3><?php echo $ctleft; ?> CT left! </h3>
                                            </div>
                                            <?php
                                        }

                                    }
                                }
                            
                            
                                        


                                    if($sgoal == 'A-'){
                                        

                                    $min_ct = 15;
                                    
                                    $c=0;
                                    ?>
                                    <div class="carousel-item active" id="citems">
                                    <h3>According to set Goal grade, the minimum required marks in every class tests is: <?php echo $min_ct;  ?>.<br>
                                        The timeline for achieved marks in class tests is viewable here. Click right or left to view:
                                    </h3>
                                    </div>
                                    <?php
                                        $c=1;
                                        for($i=0;$i<$count;$i++){
                                            
                                            $ctleft=($count-($i))-1;
                                            
                                            $diff;
                                            

                                        if($a[$i]>=$min_ct)
                                          {

                                              $rra[$i]=$a[$i];

                                              $gr=3-sizeof($rra);

                                              $diff=$a[$i]-$min_ct;

                                              

                                              
                                                
                                        ?>
                                        
                                            <div class="carousel-item" id="ctems">
                                                <h2 >Class test:<?php echo $i+1;?></h2>
                                                <h3>Marks achieved: <?php echo $a[$i]; ?>. Satisfactory!.Get the same or better marks in <?php echo $gr; ?> more class tests. </h3>
                                                <h3><?php echo $ctleft; ?> CT left! </h3>
                                            </div>
                                            

                                        
                                                
                                <?php       
                                                $c++;
                                                
                                        }

                                        else if($a[$i]>=$min_ct-5 && $a[$i]<$min_ct){


                                            $diff2=$min_ct-$a[$i];
                                            
                                            ?>

                                            <div class="carousel-item" id="ctems">
                                                <h2 >Class test:<?php echo $i+1; ?></h2>
                                                <h3>Marks achieved: <?php echo $a[$i]; ?>. Still Salvagable.  Make up for <?php echo $diff2; ?> marks in any next best class tests or Midterms and Finals. </h3>
                                                <h3><?php echo $ctleft; ?> CT left! </h3>
                                            </div>

                                            
                                            <?php
                                            $c++;
                                        
                                        }
                                        else{
                                            ?>

                                            <div class="carousel-item" id="ctems">
                                                <h2 >Class test:<?php echo $i+1; ?></h2>
                                                <h3>Marks achieved: <?php echo $a[$i]; ?>. Not suitable to reach current grade. Do better in next class tests </h3>
                                                <h3><?php echo $ctleft; ?> CT left! </h3>
                                            </div>
                                            <?php
                                        }

                                    }
                                }
                            
                            
                                        


                                        if($sgoal == 'B+'){
                                        

                                        $min_ct = 14;
                                        
                                        $c=0;
                                        ?>
                                        <div class="carousel-item active" id="citems">
                                        <h3>According to set Goal grade, the minimum required marks in every class tests is: <?php echo $min_ct;  ?>.<br>
                                            The timeline for achieved marks in class tests is viewable here. Click right or left to view:
                                        </h3>
                                        </div>
                                        <?php
                                            $c=1;
                                            for($i=0;$i<$count;$i++){
                                                
                                                $ctleft=($count-($i))-1;
                                                
                                                $diff;
                                                
    
                                            if($a[$i]>=$min_ct)
                                              {
    
                                                  $rra[$i]=$a[$i];
    
                                                  $gr=3-sizeof($rra);
    
                                                  $diff=$a[$i]-$min_ct;
    
                                                  
    
                                                  
                                                    
                                            ?>
                                            
                                                <div class="carousel-item" id="ctems">
                                                    <h2 >Class test:<?php echo $i+1;?></h2>
                                                    <h3>Marks achieved: <?php echo $a[$i]; ?>. Satisfactory!.Get the same or better marks in <?php echo $gr; ?> more class tests. </h3>
                                                    <h3><?php echo $ctleft; ?> CT left! </h3>
                                                </div>
                                                
    
                                            
                                                    
                                    <?php       
                                                    $c++;
                                                    
                                            }
    
                                            else if($a[$i]>=$min_ct-6 && $a[$i]<$min_ct){
    
    
                                                $diff2=$min_ct-$a[$i];
                                                
                                                ?>
    
                                                <div class="carousel-item" id="ctems">
                                                    <h2 >Class test:<?php echo $i+1; ?></h2>
                                                    <h3>Marks achieved: <?php echo $a[$i]; ?>. Still Salvagable.  Make up for <?php echo $diff2; ?> marks in any next best class tests or Midterms and Finals. </h3>
                                                    <h3><?php echo $ctleft; ?> CT left! </h3>
                                                </div>
    
                                                
                                                <?php
                                                $c++;
                                            
                                            }
                                            else{
                                                ?>
    
                                                <div class="carousel-item" id="ctems">
                                                    <h2 >Class test:<?php echo $i+1; ?></h2>
                                                    <h3>Marks achieved: <?php echo $a[$i]; ?>. Not suitable to reach current grade. Do better in next class tests </h3>
                                                    <h3><?php echo $ctleft; ?> CT left! </h3>
                                                </div>
                                                <?php
                                            }
    
                                        }
                                    }
                                
                                
                                            


                                        if($sgoal == 'B'){
                                        

                                        $min_ct = 12;
                                        
                                        $c=0;
                                        ?>
                                        <div class="carousel-item active" id="citems">
                                        <h3>According to set Goal grade, the minimum required marks in every class tests is: <?php echo $min_ct;  ?>.<br>
                                            The timeline for achieved marks in class tests is viewable here. Click right or left to view:
                                        </h3>
                                        </div>
                                        <?php
                                            $c=1;
                                            for($i=0;$i<$count;$i++){
                                                
                                                $ctleft=($count-($i))-1;
                                                
                                                $diff;
                                                
    
                                            if($a[$i]>=$min_ct)
                                              {
    
                                                  $rra[$i]=$a[$i];
    
                                                  $gr=3-sizeof($rra);
    
                                                  $diff=$a[$i]-$min_ct;
    
                                                  
    
                                                  
                                                    
                                            ?>
                                            
                                                <div class="carousel-item" id="ctems">
                                                    <h2 >Class test:<?php echo $i+1;?></h2>
                                                    <h3>Marks achieved: <?php echo $a[$i]; ?>. Satisfactory!.Get the same or better marks in <?php echo $gr; ?> more class tests. </h3>
                                                    <h3><?php echo $ctleft; ?> CT left! </h3>
                                                </div>
                                                
    
                                            
                                                    
                                    <?php       
                                                    $c++;
                                                    
                                            }
    
                                            else if($a[$i]>=$min_ct-8 && $a[$i]<$min_ct){
    
    
                                                $diff2=$min_ct-$a[$i];
                                                
                                                ?>
    
                                                <div class="carousel-item" id="ctems">
                                                    <h2 >Class test:<?php echo $i+1; ?></h2>
                                                    <h3>Marks achieved: <?php echo $a[$i]; ?>. Still Salvagable.  Make up for <?php echo $diff2; ?> marks in any next best class tests or Midterms and Finals. </h3>
                                                    <h3><?php echo $ctleft; ?> CT left! </h3>
                                                </div>
    
                                                
                                                <?php
                                                $c++;
                                            
                                            }
                                            else{
                                                ?>
    
                                                <div class="carousel-item" id="ctems">
                                                    <h2 >Class test:<?php echo $i+1; ?></h2>
                                                    <h3>Marks achieved: <?php echo $a[$i]; ?>. Not suitable to reach current grade. Do better in next class tests </h3>
                                                    <h3><?php echo $ctleft; ?> CT left! </h3>
                                                </div>
                                                <?php
                                            }
    
                                        }
                                    }
                                
                                
                                            ?>
     
                            

                        </div>

                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            </div>
                </div>

            <br>
            <br>
            <br>
            <br>

            <div class="hmid_bot">
                    <div class="hmid_bot1">
                        
                    <h1>Progress:</h1>
                    
                    <div>
                        
                        <style type="text/CSS">
                            .outer1{
                                height: 25px;
                                width: 900px;
                                border: 1px solid #000;
                            }
                            .inner1{
                                height: 25px;
                                width: <?php echo $ctper ?>% !important;
                                border-right: 1px solid #000;
                                background-color: cyan;
                            }
                            .maindiv1{
                                display: flex;
                                justify-content: center;
                            }
                        </style>

                        <div class="testdiv">
                        <div class="label">Class Tests</div>
                            <div class="maindiv1">
                                <div class="outer1">
                                    <div class="inner1">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="inner1edit">
                                <h6 id="h6style">
                                    <?php echo $ctconv; ?> /20
                                </h6>
                            </div>
                            
                        </div>
                    </div>

                    <br>

                    <div>
                        <?php


                        if( $row4['mid'] != 'NULL' &&  $row4['final'] != 'NULL'){
                            $mid=$row4['mid'];
                            $final=$row4['final'];
                            $exammain = $mid + $final;

                            $examper = ($exammain/70)*100;
                        }

                        else if( $row4['mid'] != 'NULL'){
                            $mid=$row4['mid'];
                            $final=0;
                            $exammain = $mid;
                            $examper = ($exammain/30)*100;

                        }

                        else if( $row4['mid'] == 'NULL' && $row4['final'] == 'NULL'){
                            $exammain = 0;
                            $examper = 0;

                        }

                        ?>
                        <style type="text/CSS">
                            .outer{
                                height: 25px;
                                width: 900px;
                                border: 1px solid #000;
                            }
                            .inner{
                                height: 25px;
                                width: <?php echo $examper ?>% !important;
                                border-right: 1px solid #000;
                                background-color: lightgreen;
                            }
                            .maindiv{
                                display: flex;
                                justify-content: center;
                            }
                        </style>

                        <div class="testdiv">

                        <div class="label">Mid & Final</div>
                            <div class="maindiv">
                                <div class="outer">
                                    <div class="inner">
                                    </div>                   
                                </div>
                            </div>
                                <div class="inner1edit">
                                    <h6 id="h6style">
                                        <?php echo $exammain; ?> /70
                                    </h6>
                                </div>
                        </div>
                    </div>

                    <br>

                    <div>
                        <?php


                        if( $row4['attendance'] != 'NULL' &&  $row4['assignment'] != 'NULL'){
                            $att=$row4['attendance'];
                            $assign=$row4['assignment'];
                            $attassign = $att + $assign;

                            $attassignper = ($attassign/10)*100;
                        }

                        if( $row4['attendance'] == 'NULL' &&  $row4['assignment'] == 'NULL'){
                            $attassign = 0;
                            $attassignper = 0;
                        }

                        ?>
                        <style type="text/CSS">
                            .outer2{
                                height: 25px;
                                width: 900px;
                                border: 1px solid #000;
                            }
                            .inner2{
                                height: 25px;
                                width: <?php echo $attassignper ?>% !important;
                                border-right: 1px solid #000;
                                background-color: red;
                            }
                            .maindiv2{
                                display: flex;
                                justify-content: center;
                            }
                        </style>

                        <div class="testdiv2">
                            <div class="label">Attendence & Assignment</div>
                            <div class="maindiv2">
                                <div class="outer2">
                                    <div class="inner2">
                                    </div>
                                </div>
                            </div>
                            <div class="inner1edit">
                                    <h6 id="h6style">
                                        <?php echo $attassign; ?> /10
                                    </h6>
                                </div>
                            
                        </div>
                    </div>

                    <br>
                    <div>
                        <style type="text/CSS">
                            .outer3{
                                height: 25px;
                                width: 900px;
                                border: 1px solid #000;
                            }
                            .inner3{
                                height: 25px;
                                width: <?php echo $mymarksper ?>% !important;
                                border-right: 1px solid #000;
                                background-color: orange;
                            }
                            .maindiv3{
                                display: flex;
                                justify-content: center;
                            }
                        </style>

                            <div class="testdiv2">
                            <div class="label">Overall</div>
                            <div class="maindiv3">
                                <div class="outer3">
                                    <div class="inner3">
                                    </div>
                                </div>
                            </div>

                            
                            <div class="inner1edit">
                                    <h6 id="h6style">
                                        <?php echo $mymarks; ?> / <?php echo $mygrademarks; ?>
                                    </h6>
                                </div>
                    </div>
                    </div>

                    
                    
                </div>
            </div>
        </div>

        <footer class="footer">
        <span id="fspan1">Developed by </span><span id="fspan2">Tres Commas"</span>  | 2022 | <span id="fspan1">All Rights Reserved</span> 
    </footer>

    
</div>
    

</body>
</html>
                               