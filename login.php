<?php 
session_start(); 
include "db_connect.php";
?>

<?php

if (isset($_POST['id']) && isset($_POST['pass'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uid = validate($_POST['id']);
	$pass = validate($_POST['pass']);

	if (empty($uid)) {
		echo '<script>
		alert("ERROR! , User ID required..");
		window.location = "welcome.php";
		</script>';
	}

	else if(empty($pass)){
		echo '<script>
		alert("ERROR! Password required..");
		window.location = "welcome.php";
		</script>';
	}


	else{
		date_default_timezone_set('Asia/Dhaka');
		$login_date = date('Y-m-d g:i:s');

		$sql = "SELECT * FROM student WHERE student_id='$uid' AND s_password='$pass'";
		$result = mysqli_query($conn, $sql);
		
		$sql1 = "SELECT * FROM overseer WHERE admin_id='$uid' AND ad_pass='$pass'";
		$result1 = mysqli_query($conn, $sql1);

		$sql2 = "SELECT * FROM teacher WHERE teacher_id='$uid' AND t_password='$pass'";
		$result2 = mysqli_query($conn, $sql2);

		$sql3 = "SELECT * FROM stu_log WHERE student_id='$uid'";
		$result3 = mysqli_query($conn, $sql3);

		$sql4 = "SELECT * FROM teach_log WHERE teacher_id='$uid'";
		$result4 = mysqli_query($conn, $sql4);
		

		$row = mysqli_fetch_assoc($result);
		$row1 = mysqli_fetch_assoc($result1);
		$row2 = mysqli_fetch_assoc($result2);
		$row3 = mysqli_fetch_assoc($result3);
		$row4 = mysqli_fetch_assoc($result4);
			

		if(mysqli_num_rows($result) == 1){
			if ($row['student_id'] === $uid && $row['s_password'] === $pass) {
				$_SESSION['s_email'] = $row['s_email'];
				$_SESSION['s_name'] = $row['s_name'];
				$_SESSION['student_id'] = $row['student_id'];
				$_SESSION['IS_LOGIN'] = 'yes';

				$currentid = $_SESSION['student_id'];

				$id = $row3['student_id'];

				if($row3['student_id'] == $currentid){
					$row3['s_login_time'] = $login_time;
					$row3['s_login_date'] = $login_date;

					$insert = "UPDATE stu_log SET s_login_time= now(), s_login_date= '$login_date' WHERE student_id = '$currentid'";

					$logintime = mysqli_query($conn, $insert);

					echo '<script>
					window.location = "home.php";
					</script>';
					die();
				}
				
				else{
				$insert = "INSERT INTO stu_log(student_id, s_login_time, s_login_date) VALUES ('$currentid', now(), '$login_date')";
				$logintime = mysqli_query($conn, $insert);

				echo '<script>
				window.location = "home.php";
				</script>';
				die();
				}
			}
			else{
				echo '<script>
				alert("Sorry! Your User or Password does not match");
				window.location = "welcome.php";
				</script>';
			}
		}

		else if(mysqli_num_rows($result2) == 1){
			
			if ($row2['teacher_id'] === $uid && $row2['t_password'] === $pass) {
				$_SESSION['t_email'] = $row2['t_email'];
				$_SESSION['t_name'] = $row2['t_name'];
				$_SESSION['teacher_id'] = $row2['teacher_id'];
				$_SESSION ['IS_LOGIN']='yes';

				$currentid = $_SESSION['teacher_id'];

				$id2= $row4['teacher_id'];

				if($row4['teacher_id'] == $currentid){
					$row4['t_login_time'] = $login_time;
					$row4['t_login_date'] = $login_date;

					$insert = "UPDATE teach_log SET t_login_time= now(), t_login_date= '$login_date' WHERE teacher_id = '$currentid'";

					$logintime = mysqli_query($conn, $insert);

					echo '<script>
					window.location = "tlogin.php";
					</script>';
					die();
				}
				
				else{
				$insert = "INSERT INTO teach_log(teacher_id, t_login_time, t_login_date) VALUES ('$currentid', now(), '$login_date')";
				$logintime = mysqli_query($conn, $insert);

				echo '<script>
				window.location = "tlogin.php";
				</script>';
				die();
			}
		}
		else{
				echo '<script>
				alert("Sorry! Your User or Password does not match");
				window.location = "welcome.php";
				</script>';
			}
		}

		else if(mysqli_num_rows($result1) == 1) {
			
			if ($row1['admin_id'] == $uid && $row1['ad_pass'] == $pass) {
				$_SESSION['ad_email'] = $row1['ad_email'];
				$_SESSION['ad_name'] = $row1['ad_name'];
				$_SESSION['admin_id'] = $row1['admin_id'];
				$_SESSION['IS_LOGIN']='yes';
				echo '<script>
				window.location = "admin.php";
				</script>';
				die();
			}
		}else{
				echo '<script>
				alert("Sorry! Your User or Password does not match");
				window.location = "welcome.php";
				</script>';
			}
		}
	}		
else{
	echo '<script>
	window.location = "welcome.php";
	</script>';
}

?>

