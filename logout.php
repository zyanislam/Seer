<?php
include "db_connect.php";

session_start();

$logout_time = date("H:i:s");

$sql = "SELECT * FROM student";
$out = mysqli_query($conn, $sql);

$sql2 = "SELECT * FROM teacher";
$out2 = mysqli_query($conn, $sql2);


$sql3 = "SELECT * FROM stu_log";
$out3 = mysqli_query($conn, $sql3);

$sql4 = "SELECT * FROM teach_log";
$out4 = mysqli_query($conn, $sql4);

$row = mysqli_fetch_assoc($out);
$row2 = mysqli_fetch_assoc($out2);


if(session_destroy())
{
    if($row['flag'] == 1){
        $sql5 = "UPDATE stu_log SET s_logout_time = now()  WHERE student_id = '$_SESSION[student_id]'";
        $out5 = mysqli_query($conn, $sql5);
    }

    if($row2['flag'] == 2){
    $sql6 = "UPDATE teach_log SET t_logout_time = now()  WHERE teacher_id = '$_SESSION[teacher_id]'";
    $out6 = mysqli_query($conn, $sql6);
    }

    header("Location: welcome.php");

}

?>