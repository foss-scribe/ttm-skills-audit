<?php


//Load config files
include('inc/config.dev.php');
//include('inc/config.test.php');
//include('inc/config.prod.php');
//Load database class
include('inc/db.class.php');

//$db = new DB();

//print_r($db); //debug DB object



//Test if form has been submitted
if (isset($_POST['submit']))
{
	//form has been sent

	//commit to DB
	//TBA

	//display thank you message
	require_once('views/header.php');
	require_once('views/message_form_sent.php');
	require_once('views/footer.php');

} else {
	//form not sent

	//check if email has been passed to URL
	if (isset($_GET['email']))
	{
		$getEmail = $_GET['email'];
		
		//echo htmlspecialchars($getEmail);	

		//validate the email
		if (!filter_var($getEmail, FILTER_VALIDATE_EMAIL)) {
  			$emailErr = "Invalid email format"; 
  			//echo $emailErr;
			require_once('views/header.php');
			require_once('views/sorry.php');
			require_once('views/footer.php');
			die();
		} else {

		//query db for email
		//	$db->query('SELECT * from ttm_members WHERE email = :Email');
		//	$db->bind(':Email', $getEmail);
		//	$member = $db->single();

		// if the email doesn't exist in the DB die!


		//query to generate skills
		//	$db->query('SELECT id, skill, description FROM ttm_skills');
		//	$skills = $db->resultset();

		//query to generate skills
		//	$db->query('SELECT id, interest, description FROM ttm_interests');
		//	$interests = $db->resultset();

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
		require_once('views/header.php');
		require_once('views/sorry.php');
		require_once('views/footer.php');
		die();
	}


}




?>
