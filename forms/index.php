<?php

$message['title'] = "TTM Forms";
$message['body'] = "<p>You've reached the TTM web forms library. Click one of the links below to:";
$message['body'] .= "<ul>";
$message['body'] .= "<li><a href='new_member.php'>Create a new member account</a></li>"; 
$message['body'] .= "<li><a href='reset_password.php'>Reset your password</a></li>";
$message['body'] .= "<li><a href='update_details.php'>Update your personal details</a></li>";
$message['body'] .= "<li><a href='skills_audit.php'>Take part in our skills audit</a></li>";
$message['body'] .= "</ul>"; 

//display views
	require_once('views/header.php');
	require_once('views/message.php');
	require_once('views/footer.php');
	die();


?>