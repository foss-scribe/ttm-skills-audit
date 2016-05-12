<?php


//Load config files
include('inc/config.dev.php');
//include('inc/config.test.php');
//include('inc/config.prod.php');
//Load database class
include('inc/db.class.php');

$db = new DB();

//print_r($db); //debug DB object



//Test if form has been submitted
if (isset($_POST['g-recaptcha-response']))
{
	//form has been sent
	
	//test captcha
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
	
	//validate captcha
	if ($result['success'] != 1)
	{
    	//captcha failed so error our and die!

		$message['title'] = "reCAPTCHA failed";
		$message['body'] = "<p>You failed the reCAPTCHA test, please go back and try again</p>";

		require_once('views/header.php');
		require_once('views/error.php');
		require_once('views/footer.php');
        die();

    } else {
		//captcha passed, write to database
		//TBA

		//if write to DB succeeds, then display success message
		require_once('views/header.php');
		require_once('views/message_form_sent.php');
		require_once('views/footer.php');

		//elseif commit to DB fails, then error out and die!
		//require_once('views/header.php');
		//require_once('views/error.php');
		//require_once('views/footer.php');
	}





} else {
	//form not sent

	//check if email has been passed to URL
	if (isset($_GET['email']))
	{
		$getEmail = $_GET['email'];
		
		//echo htmlspecialchars($getEmail);	

		//validate the email
		if (!filter_var($getEmail, FILTER_VALIDATE_EMAIL)) {
  			//$emailErr = "Invalid email format"; 
  			//echo $emailErr;

			$message['title'] = "Invalid email address";
			$message['body'] = "<p>You have entered an invalid email address. Please go back and try again.</p>";

			require_once('views/header.php');
			require_once('views/error.php');
			require_once('views/footer.php');
			die();
		} else {

		
		$member['email'] = $getEmail; //replace me with data from DB


		//query db for email
		//	$db->query('SELECT * from ttm_members WHERE email = :Email');
		//	$db->bind(':Email', $getEmail);
		//	$member = $db->single();

		// if the email doesn't exist in the DB die!


		//query to generate skills
			$db->query('SELECT id, skill, description FROM ttm_skills');
			$skills = $db->resultset();

		//query to generate skills
			$db->query('SELECT id, interest, description FROM ttm_interests');
			$interests = $db->resultset();

		//print_r($rows);	
	
			//Load views
			//Load HTML header
			require_once('views/header.php');
			//load form
			require_once('views/skills_audit_form.php');
			//Load HTML footer
			require_once('views/footer.php');
		}


	} else {
		//no email so we kill the process


		$message['title'] = "Not a registered user";
		$message['body'] = file_get_contents('views/sorry.php');

		require_once('views/header.php');
		require_once('views/error.php');
		require_once('views/footer.php');
		die();
	}


}




?>
