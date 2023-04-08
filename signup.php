<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Seer</title>
    <link rel="stylesheet" href="signup.css">


    <script src="https://code.jquery.com/jquery-3.1.1.min.js" crossorigin="anonymous"></script><script src="https://code.jquery.com/jquery-3.1.1.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>


</head>
<body>
<?php
    $lh = "localhost";
    $user =  "root";
    $pw = "";
    $db = "seer";
    $connect = mysqli_connect($lh, $user, $pw, $db);

        if(!$connect){
            die(mysqli_error($connect));
        }
    ?>

    <div class="top">
        <div class="layout">
            
        </div>

        <div class="mid">

            <h1 class="text-center" id="h1color" style="margin-top: 0px;">Who Am I?</h1>

            <div class="container">
                <div class="ui segment" id="buttondiv" >
                    <button class="ui secondary button huge" name="teacher" id="buttonbox" onclick="window.location.href = 'signupteacher.php';">Teacher</button>
                    <button class="ui orange button huge" name="student" id="buttonbox" onclick="window.location.href = 'signupstudent.php';">Student</button>
                </div>
            </div>
            
            <div>
            <br>
            <br>
            <br>
            <br>
            <button type="submit" name="goback" class="ui secondary button large" id="buttonbox" onclick="window.location.href = 'welcome.php';">Go Back</button>
            </div>
        </div>


        <footer class="footer">
            <span id="fspan1">Developed by </span><span id="fspan2">Tres Commas"</span>  | 2022 | <span id="fspan1">All Rights Reserved</span> 
        </footer>
    </div>
</body>
</html>