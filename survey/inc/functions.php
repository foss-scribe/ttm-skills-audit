<?php

function generatePassword($length = 0) {

	$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);

	return $randomString;

}

function resetPassword($email) {

	$newPassword = generatePassword(8);
	$hashedPassowrd = md5($newPassword);

	$db->query('UPDATE ttm_members SET password = :Password WHERE email = :Email');
	$db->bind(':Password', $hashedPassowrd);
	$db->bind(':Email', $email);
	$db->execute();


	$subject = "TTM password reset";
		$message = "Your TTM password has been reset. Your new password is: $password.";
		mail($_POST['email'],$subject, $message );

}


?>
