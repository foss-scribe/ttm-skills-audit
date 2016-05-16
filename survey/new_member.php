<?php

date_default_timezone_set("Australia/Melbourne");

//Load config files
include('inc/config.dev.php');
//include('inc/config.test.php');
//include('inc/config.prod.php');
//Load database class
include('inc/db.class.php');

$db = new DB();

$data['page_title'] = "TTM: New Member Form";

if (isset($_POST['email']) ) {
//form submitted

	$data['heading'] = "Application received!";
	$data['message'] = "<p>Thank you for joining Transition Towns Maroondah! Your details have been received and we have sent your new password to the email address you provided.</p>";
	$data['message'] .= "<p>Once, you receive your password you are free to log in and amend your details, if necessary.</p>";
	$data['message'] .= "<p>Please consider taking part in our <a href='/skills_audit.php'>skills audit</a>. This is a TTM initiative designed to provide us with an idea of our members' skills interest from which we develop our projects.</p>";
	$data['message'] .= "<h3>Spread the word!</h3>";
	$data['message'] .= "<a class='twitter-share-button' href='https://twitter.com/intent/tweet?text=I%20just%20joined%20Transition%20Town%20Maroondah' data-hashtags='sustainability,transitiontown'>Tweet</a>";

	require_once('views/header.php');
	require_once('views/message.php');
	require_once('views/footer.php');
     die();

} else
//form not submitted so display
{

	require_once('views/header.php');
	require_once('views/new_member_form.php');
	require_once('views/footer.php');
    die();

}

?>
