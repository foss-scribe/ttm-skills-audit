<?php

date_default_timezone_set("Australia/Melbourne");

//Load config files
include('inc/config.dev.php');
//include('inc/functions.php');
//include('inc/config.test.php');
//include('inc/config.prod.php');
//Load database class
include('inc/db.class.php');
include('inc/functions.php');

$db = new DB();

if (!$db->error == "") {
	

	$message['title'] = "Internal error";
	$message['body'] = "<p>We're sorry, our site has experienced an internal error. Please try again later.</p>";

	if ( logSystemError($db->error, "Database") == false) {
		$message['body'] .= "<p>Additionally there was an error attempting to notify the administrator.</p>";
		$message['body'] .= "<p>Please <a href='mailto:admin@ttm.org.au?subject=" . $message['title'] . ":%20" . preg_replace('/\s+/', '%20', $db->error) . "'>email us directly</p>";
	} else {
		$message['body'] .= "<p>This incident has been reported and will be addressed as soon as possible.</p>";

	}

	require_once('views/header.php');
	require_once('views/message.php');
	require_once('views/footer.php');

	die();
}


$data['page_title'] = "TTM: Reset your password";

$date = date("Y-m-d H:i:s");


if (isset($_POST['g-recaptcha-response']) ){
//form submitted

	//check and verify reCAPTCHA
	$captchaResponse = testReCaptcha($_POST['g-recaptcha-response']);

	//print_r($captchaResponse);

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
		$member = $db->single();

		if ($db->rowCount() == 0 ) {

			// email doesn't exist so die
			$message['title'] = "Email address not found";
			$message['body'] = "<p>Sorry, there's no record of the email address " . $_POST['email'] . " in our database. Please go back and try again.</p>";

			require_once('views/header.php');
			require_once('views/message.php');
			require_once('views/footer.php');
			die();

		} else {
			//email is correct and in the DB so process request

			//call the resetPassword function
			resetPassword($_POST['email'], $date, $db);
			//create a note for update event
			$newMemberID = $member['id'];
			$note = "Password reset on " . date_format(date_create(), "g:i A, l j F, Y");
			$creator = "System";

			createNote($newMemberID, $note, $creator, $date, $db);

			//display message and die
			$message['title'] = "Password reset";
			$message['body'] = "<p>Your password has been reset and sent to your email address.</p>";

			require_once('views/header.php');
			require_once('views/message.php');
			require_once('views/footer.php');
			die();

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
