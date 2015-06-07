<?php

session_start();

if(isset($_POST['action']) && $_SESSION['logged_in'] == 1) {
	include_once('user_list.php');
	$userList = new User_List();
		
		switch($_POST['action']) {
			
				case "add":
					echo $userList->addList();
					break;
				case "delete":
					echo $userList->deleteList();
					break;
				default:
					header('Location: index.php');
					break;
		
		}
} 
else {
	echo 'error at action switch';
}

?>