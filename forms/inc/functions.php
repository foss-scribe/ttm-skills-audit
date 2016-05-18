<?php

function generatePassword($length = 0) {

	$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);

	return $randomString;

}

function resetPassword($email, $date, $db) {

	$newPassword = generatePassword(8);
	$hashedPassword = md5($newPassword);

	$db->query('UPDATE ttm_members SET
		date_modified = :DateModified,
		password = :Password
		WHERE email = :Email');
	$db->bind(':DateModified', $date);
	$db->bind(':Password', $hashedPassword);
	$db->bind(':Email', $email);
	$db->execute();


	$subject = "TTM password reset";
	$message = "Your TTM password has been reset. Your new password is: $newPassword";
	
	mail($_POST['email'],$subject, $message );

	return $db;

}

function createNote($member, $note, $creator, $date, $db){

	$db->query('INSERT INTO ttm_member_notes (member, note, creator, date_created) values (:MemberID, :Note, :Creator, :Date_Created)');

	$db->bind(':MemberID', $member);
	$db->bind(':Creator', $creator);
	$db->bind(':Note',$note);
	$db->bind(':Date_Created',$date);
	$db->execute();

	return $db;

}

function testReCaptcha($recptchaResponse)
{
	//create local variable of reCAPTCHA response
	$response_string = $_POST["g-recaptcha-response"];

	//assign const SECRET_KEY to local variable
	$secret_key = SECRET_KEY;

	//create a correctly formatted URL for API call
	$capchaAPICcall = "https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$response_string";

	//get the response data from google
	$data = file_get_contents($capchaAPICcall);

	//process the JSON into a PHP array
	$result = json_decode($data, true);

	return $result;
}


?>
