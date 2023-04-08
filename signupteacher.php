<?php 
include "db_connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="signupteacher.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

    <title>Project Seer | Teacher Sign Up</title>
</head>

<body id="bodydiv">
    <?php
 

    if(isset($_POST['submit']))
    {
        $name = $_POST['t_name'];
        $email = $_POST['t_email'];
        $phone = $_POST['t_phone'];
        $flag = 2;
        $user = $_POST['teacher_id'];
        $password = $_POST['t_password'];
        $cpassword = $_POST['c_password'];

        if($password != $cpassword)
        {
           echo '<script>
            alert("Passwords does not match. Try again.");
            window.location = "signupteacher.php";
            </script>';
        }
        
        else if($name == NULL || $email == NULL || $phone == NULL || $user == NULL || $password == NULL || $cpassword == NULL)
        {
            echo '<script>
            alert("Sorry! You forgot to put your information in one of the fields");
            window.location = "signupteacher.php";
            </script>';
        }


        else
        {
            $insert = "INSERT INTO teacher(teacher_id, flag, t_name, t_email, t_phone, t_password) VALUES ('$user', '$flag', '$name', '$email', '$phone', '$password')";

            $result = mysqli_query($conn, $insert);

            if($result)
            {
                echo '<script>
                alert("Success. Teacher User Created!");
                window.location = "welcome.php";
                </script>';
            }
            else{
                echo "Not successful";
            }
        }
    }

    ?>



    <div class="top">
        <div class="layout">
            
        </div>
        
        <div class="mid">
            <h1 class="text-center" id="h1color" style="margin-top: 0px;">Sign Up | Teacher</h1>

            <div class="container">
                <form action="signupteacher.php" method="POST" enctype="multipart/form-data">
                    <div>
                        <input type="text" class="form-control inup" id="inputs" name="t_name" placeholder="Name">
                    </div>
                    <div>
                        <input type="text" class="form-control" id="inputs" name="t_email" placeholder="Email">
                    </div>
                    <div>
                        <input type="number" class="form-control" id="inputs" name="t_phone" placeholder="Phone Number" required="required" maxlength="11" minlength="11">
                    </div>
                    <div>
                        <input type="number" class="form-control" id="inputs" name="teacher_id" placeholder="User ID">
                    </div>
                    <div>
                        <input type="password" class="form-control" id="inputs" name="t_password" placeholder="Password">
                    </div>
                    <div>
                        <input type="password" class="form-control" id="inputs" name="c_password" placeholder="Confirm Password">
                    </div>

                    <div class="ui segment" id="buttondiv">
                        <button type="submit" name="submit" class="ui orange button large" id="buttonbox">Sign Up</button>

                        <span></span>
                        <button type="submit" name="goback" class="ui secondary button large" id="buttonbox" onclick="window.location.href = 'signup.php';">Go Back</button>
                    </div>
                </form>
            </div>
        </div>
        
        <footer class="footer">
            <span id="fspan1">Developed by </span><span id="fspan2">Tres Commas"</span>  | 2022 | <span id="fspan1">All Rights Reserved</span> 
        </footer>
    </div>  


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>