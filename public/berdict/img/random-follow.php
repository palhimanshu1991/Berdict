<?php
ob_start();
session_start();
include "common.php";
$time=time();
$actual_time = date('d M Y ',$time);

$random_user1 = Rand(2,99);
$random_user2 = Rand(2,99);

	if($random_user1==$random_user2) 
	{
		echo 'both users are same';
	
	} else 
	{ 
			echo 'Users are not same ';
			
			$sql_dir="select * from user_friends where friend_user_id='".$random_user1."' and follower_user_id='".$random_user2."'  ";
			$res_dir=mysql_query($sql_dir);
			$row_dir=mysql_fetch_object($res_dir);
			$check_num=mysql_num_rows($res_dir);			

					
		if (!$check_num==0) {
		
			echo 'but relation already exists';
		
		}
		
		if ($check_num==0) {
		
			$sql="insert into user_friends
			set			
				friend_user_id ='".$random_user1."',
				follower_user_id ='".$random_user2."',					
				friend_status = 1";
			
			mysql_query($sql) or die(mysql_error());			
			
			echo $random_user2 .' followed '. $random_user1;
				
		}
		
	}

?>



