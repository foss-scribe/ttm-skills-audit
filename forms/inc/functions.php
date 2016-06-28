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
	$headers = "From: ttmaroonda@gmail.com";
	
	mail($_POST['email'],$subject, $message, $headers );

	return $db;

}

function logSystemError($errorMessage, $errorType) {

	$subject = $errorType . ": " . $errorMessage;
	$message = "TTM page " . $_SERVER['PHP_SELF'] . " experienced an error: \n\n";
	$message .= $subject;
	$headers = "From: admin@ttm.org.au";

	if (!mail(SYSEMAIL, $subject, $message, $headers)) {
		return false;
	} else {
		return true;

	}

	


}

function createNote($member, $note, $creator, $date, $db) {

	$db->query('INSERT INTO ttm_member_notes (member, note, creator, date_created) values (:MemberID, :Note, :Creator, :Date_Created)');

	$db->bind(':MemberID', $member);
	$db->bind(':Creator', $creator);
	$db->bind(':Note',$note);
	$db->bind(':Date_Created',$date);
	$db->execute();

	return $db;

}

function updateNote($member, $note, $editor, $dateModified, $db) {
	$db->query('UPDATE ttm_member_notes SET
		note = :Note,
		last_editor = :lastEditor,
		date_edited = :DateModified
		WHERE member = :MemberID');

	$db->bind(':Note', $note);
	$db->bind(':lastEditor', $editor);
	$db->bind(':DateModified', $dateModified);
	$db->bind(':MemberID', $member);
	$db->execute();
	
	return $db;
}

/**
*
* Gets all interests/skills from the database then counts the number of members with that skill/interest
*
*
*/
function processSkills($dataType, $db) {
	//instantiate empty array
	$processedItems = [ ];

	switch ($dataType) {
		case 'skills':
			$parentTable = "ttm_skills";
			$childTable = "ttm_member_skills";
			$childColumn = "skill";
			$itemLabel = "skill";
			break;
		case 'interests':
			$parentTable = "ttm_interests";
			$childTable = "ttm_member_interests";
			$childColumn = "interest";
			$itemLabel = "interest";
			break;
		default:
			# code...
			break;
	}

	//build initial query
	$db->query('SELECT * FROM ' . $parentTable);
	$parentResult = $db->resultset();

	foreach ($parentResult as $item) {
		$db->query('SELECT * from ' . $childTable . ' WHERE ' . $childColumn . ' = :ChildItem');
		$db->bind(':ChildItem', $item['id']);
		$db->execute();
		$row = array(
			"$itemLabel"=>$item[$itemLabel],
			"description"=>$item['description'],
			"count"=>$db->rowCount()
	);
	array_push($processedItems,$row);
	}

	//return array
	return $processedItems;
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
