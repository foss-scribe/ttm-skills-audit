<?php

//Load database class
include('db/db.config.dev.php');
//include('db.config.test.php');
//include('db.config.prod.php');
include('db/db.class.php');

$db = new DB();

//print_r($db); //debug DB object

//Load HTML header
require_once('header.php');

//Test if form has been submitted
if (isset($_POST['submit']))
{
	//form has been sent
	require_once('message_form_sent.php');

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
  			echo $emailErr;
		}
	} else {
		//no email so present clean form
	}
	//import form


	$db->query('SELECT id, skill, description FROM ttm_skills');
	$skills = $db->resultset();

	$db->query('SELECT id, interest, description FROM ttm_interests');
	$interests = $db->resultset();

	//print_r($rows);


	require_once('skills_audit_form.php');

}

//Load HTML footer
require_once('footer.php');


?>
