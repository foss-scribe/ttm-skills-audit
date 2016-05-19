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

$data['page_title'] = "TTM: New Member Form";

if (isset($_POST['g-recaptcha-response']) ) {
//form submitted

	//test and verify captcha
	$captchaResponse = testReCaptcha($_POST['g-recaptcha-response']);

	if ($captchaResponse['success'] != 1) {
		$message['title'] = "reCAPTCHA test failed";
		$message['body'] = "<p>You failed the reCAPTCHA test, please go back and try again</p>";

		require_once('views/header.php');
		require_once('views/error.php');
		require_once('views/footer.php');
        die();
	} else {

		$email = strtolower($_POST['email']);

		//check if email address already exists
		$db->query('SELECT email from ttm_members WHERE email = :Email');
		$db->bind(':Email', $email);
		$db->resultSet();

		if ($db->rowCount() > 0) {
		
			$message['title'] = "Email already registered";
			$message['body'] = "<p>We're sorry, that email has already been registered with TTM.</p>";
			$message['body'] .= "<p>If you have made an error, please go back and enter a new email address.</p>";
			$message['body'] .= "<p>If you have forgotten your password, you can <a href='./reset_password.php'>request to have it reset</a></p>";

			require_once('views/header.php');
			require_once('views/message.php');
			require_once('views/footer.php');
		    die();
		} else {
			//clean email so have at it
		
			//generate a random password
			$password = generatePassword(8);
			$hashedPassword = md5($password);

			//create today's date
			$date = date("Y-m-d H:i:s");

			//create INSERT query
			$db->query('INSERT INTO ttm_members (firstname, lastname, address, postcode, suburb, email, phone, mobile, date_created, password, member_type) values (:Firstname, :Lastname, :Address, :Pcode, :Suburb, :Email, :Phone, :Mobile, :TodayDate, :Password, :MemberType)');

			$db->bind(':Firstname', $_POST['firstname']);
			$db->bind(':Lastname', $_POST['lastname']);
			$db->bind(':Address', $_POST['address']);
			$db->bind(':Pcode', $_POST['postcode']);
			$db->bind(':Suburb', $_POST['suburb']);
			$db->bind(':Email', $email);
			$db->bind(':Phone', $_POST['phone']);
			$db->bind(':Mobile', $_POST['mobile']);
			$db->bind(':TodayDate', $date);
			$db->bind(':Password', $hashedPassword);
			$db->bind(':MemberType', "subscriber");
			$db->execute();

			//create a note for the user's joining event
			$newMemberID = $db->lastInsertID();
			$note = $_POST['firstname'] . " signed up to TTM on " . date_format(date_create(), "g:i A, l j F, Y");
			$creator = "System";

			createNote($newMemberID, $note, $creator, $date, $db);

			//email user confirmation and their password
			$subject = "TTM membership confirmed";
			$text = "Thank you for joining TTM!\nYour password is $password. You'll need it if you want to participate in our skills audit or update your details.\n\nYours sincerely,\n\nThe TTM Core Group";
			mail($_POST['email'],$subject, $text );



			//set view data
			$message['title'] = "Account created!";
			$message['body'] = "<p>Thank you for joining Transition Towns Maroondah! Your details have been received and we have sent your new password to the email address you provided.</p>";
			$message['body'] .= "<p>Once, you receive your password you are free to log in and amend your details, if necessary.</p>";
			$message['body'] .= "<p>Please consider taking part in our <a href='/skills_audit.php'>skills audit</a>. This is a TTM initiative designed to provide us with an idea of our members' skills interest from which we develop our projects.</p>";
			$message['body'] .= "<h3>Spread the word!</h3>";
			$message['body'] .= "You've joined TTM, now share the word on your preferred social network!</p>";
			$body['body'] .= "<div><a class='twitter-share-button' href='https://twitter.com/intent/tweet?text=I%20just%20joined%20Transition%20Town%20Maroondah' data-hashtags='sustainability,transitiontown'>Tweet</a></div>";
			$message['body'] .= "<div class='fb-share-button' data-href='http://ttm.org.au' data-layout='button' data-mobile-iframe='true'></div>";
		
		//display views
		require_once('views/header.php');
		require_once('views/message.php');
		require_once('views/footer.php');
	     die();

		}
	}
} else {
	//form not submitted so display

	require_once('views/header.php');
	require_once('views/new_member_form.php');
	require_once('views/footer.php');
    die();

}

?>
