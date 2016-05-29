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

//print_r($db); //debug DB object



//Test if skill_audit_form has been submitted
if (isset($_POST['g-recaptcha-response']))
{
	//form has been sent
	
	//test captcha and validate 
	$captchaResponse = testReCaptcha($_POST['g-recaptcha-response']);

	if ($captchaResponse['success'] != 1)
	{
    	//captcha failed so error out and die!

		$message['title'] = "reCAPTCHA test failed";
		$message['body'] = "<p>You failed the reCAPTCHA test, please go back and try again</p>";

		require_once('views/header.php');
		require_once('views/error.php');
		require_once('views/footer.php');
        die();

    } else {
		//captcha passed, write to database

		//write to members table

    	//Create a today data
    	$date = date("Y-m-d H:i:s");
		
		$db->query('UPDATE ttm_members SET
			firstname = :Fname,
			lastname = :Lname,
			address = :Address,
			postcode = :Pcode,
			suburb = :Suburb,
			email = :Email,
			phone = :Phone,
			mobile = :Mobile,
			date_modified = :DateModified,
			website = :socialWebsite,
			twitter = :socialTwitter,
			facebook = :socialFacebook,
			googleplus = :socialGooglePlus
			WHERE id = :memberID');

		$db->bind(':Fname', $_POST['firstname']);
		$db->bind(':Lname', $_POST['lastname']);
		$db->bind(':Address', $_POST['address']);
		$db->bind(':Pcode', $_POST['postcode']);
		$db->bind(':Suburb', $_POST['suburb']);
		$db->bind(':Email', $_POST['email']);
		$db->bind(':Phone', $_POST['phone']);
		$db->bind(':Mobile', $_POST['mobile']);
		$db->bind(':DateModified', $date);
		$db->bind(':socialWebsite', $_POST['social_web']);
		$db->bind(':socialFacebook', $_POST['social_facebook']);
		$db->bind(':socialGooglePlus', $_POST['social_googleplus']);
		$db->bind(':socialTwitter', $_POST['social_twitter']);
		$db->bind(':memberID', $_POST['member_id']);
		$db->execute();



		//write note
		$note = $_POST['firstname'] . " updated their details on " . date_format(date_create(), "g:i A, l j F, Y");
		$creator = "System";
		createNote($_POST['member_id'], $note, $creator, $date, $db);

		//if write to DB succeeds, then display success message
			$message['title'] = "Thank you";
			$message['body'] = "<p>Thank you, we have updated your details.</p>";

			require_once('views/header.php');
			require_once('views/message.php');
			require_once('views/footer.php');
	}


} elseif ( isset($_POST['go'])) {

	//login form posted
	$getEmail = $_POST['email'];
	$password = $_POST['password'];
		
	//validate the email
	if (!filter_var($getEmail, FILTER_VALIDATE_EMAIL)) {

		$message['title'] = "Invalid email address";
		$message['body'] = "<p>You have entered an invalid email address. Please go back and try again.</p>";

		require_once('views/header.php');
		require_once('views/error.php');
		require_once('views/footer.php');
		die();
	} else {

		//create hash of posted password
		$password = md5($password);

		//query db for email
		$db->query('SELECT * from ttm_members WHERE email = :Email AND password= :Password');
		$db->bind(':Email', $getEmail);
		$db->bind(':Password', $password);
		$member = $db->single();
			

		if ($db->rowCount() == 0 ) {

			// if the email doesn't exist in the DB die!

			$message['title'] = "Sorry";
			$message['body'] = file_get_contents('views/sorry.php');

			require_once('views/header.php');
			require_once('views/message.php');
			require_once('views/footer.php');
			die();

		} else {

	
			//Load views
			//Load HTML header
			require_once('views/header.php');
			//load form
			require_once('views/update_details_form.php');
			//Load HTML footer
			require_once('views/footer.php');
				
		}

	}


} else {
		//Display the entry point


		require_once('views/header.php');
		require_once('views/update_details_login_form.php');
		require_once('views/footer.php');
		die();
}




?>
