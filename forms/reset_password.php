<?php

date_default_timezone_set("Australia/Melbourne");

//Load config files
include('inc/config.dev.php');
include('inc/functions.php');
//include('inc/config.test.php');
//include('inc/config.prod.php');
//Load database class
include('inc/db.class.php');

$db = new DB();
$date = date("Y-m-d H:i:s");


if (isset($_POST['g-recaptcha-response']) ){
//form submitted

	//check and verify reCAPTCHA
	$captchaResponse = testReCaptcha($_POST['g-recaptcha-response']);

	if ($captchaResponse['success'] != 1) {
		//error out and die!		
		$message['title'] = "reCAPTCHA test failed";
		$message['body'] = "<p>You failed the reCAPTCHA test, please go back and try again</p>";

		require_once('views/header.php');
		require_once('views/error.php');
		require_once('views/footer.php');
        die();

	} else {
		//check email is in the 
		$db->query('SELECT id from ttm_members WHERE email = :Email');
		$db->bind(':Email', $_POST['email']);
		$db->single();

		if ($db->rowCount() == 0 ) {

			// email doesn't exist so die
			$message['title'] = "Email address not found";
			$message['body'] = "<p>Sorry, there's no record of the email address " . $_POST['email'] . " in our database. Please go back and try again.</p>";

			require_once('views/header.php');
			require_once('views/message.php');
			require_once('views/footer.php');
			die();

		} else {

			//call the resetPassword function
			resetPassword($_POST['email'], $date);
			//create a note for update event
			$newMemberID = $db->lastInsertID();
			$note = "Password reset on " . date_format(date_create(), "g:i A, l j F, Y");
			$creator = "System";

			createNote($newMemberID, $note, $creator, $date);
		}


	}

	
} else {
//display form

	require_once('views/header.php');
	require_once('views/reset_password_form.php');
	require_once('views/footer.php');
    die();
}


?>
