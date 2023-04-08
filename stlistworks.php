<?php
    include 'db_connect.php';

        if(isset($_POST['update']))
        {
            $id = $_POST['id'];
            $cname =  $_POST['cname'];
            $ct1 = $_POST['ct1'];
            $ct2 = $_POST['ct2'];
            $ct3 = $_POST['ct3'];
            $ct4 = $_POST['ct4'];
            $ct5 = $_POST['ct5'];
            
            $mid = $_POST['mid'];
            $final = $_POST['final'];
            
            $ass = $_POST['assignment'];
            $att = $_POST['attendance'];
        
    
            $insert = "UPDATE marks SET ct1 = '$ct1', ct2 = '$ct2', ct3 = '$ct3', ct4 = '$ct4', ct5 = '$ct5', mid = '$mid', final = '$final', assignment = '$ass', attendance = '$att' WHERE student_id ='$id' and c_name = '$cname'";
    
            $result4 = mysqli_query($conn, $insert);
    
            if($result4)
            {
                echo '<script>
                alert("Data Updated");
                window.location = "tlogin.php";
                </script>';
            }
            else{
                echo "Not successful";
            }
    }

    else{
        echo '<script>
        alert("If didnt work");
        </script>';
    }   
    ?>