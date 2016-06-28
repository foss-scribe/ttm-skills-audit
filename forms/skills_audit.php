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

$data['page_title'] = "TTM: Skills Audit";



//Test if skill_audit_form has been submitted
if (isset($_POST['member_id']))
{
	//form has been sent
	
	//write to members table

    	//Create a today data
    	$date = date("Y-m-d H:i:s");

    	//clear our existing skills audit data
    	$db->query('DELETE FROM ttm_member_skills WHERE member = :Member');
    	$db->bind(':Member', $_POST['member_id']);
    	$db->execute();
    	$db->query('DELETE FROM ttm_member_interests WHERE member = :Member');
    	$db->bind(':Member', $_POST['member_id']);
    	$db->execute();

		//write to ttm_members_stories
		if ($_POST['story'] != "" ) {
			$db->query('INSERT INTO ttm_member_stories (member, story, date_created) VALUES (:Member, :Story, :Date_Created)');
			$db->bind(':Member', $_POST['member_id']);
			$db->bind(':Story', $_POST['story']);
			$db->bind('Date_Created', $date);
			$db->execute();
		}
		

		//write to ttm_member_interests
		
		//first pull all interest to loop through
		$db->query('SELECT id FROM ttm_interests');
		$interests = $db->resultset();
		//loop through each interest
		foreach ($interests as $interest) {
			//test is the variable was posted
			if (isset($_POST['interest_' . $interest['id'] ]))
			{
				$db->query('INSERT INTO ttm_member_interests (member, interest) VALUES (:Member, :Interest) ');
				$db->bind(':Member', $_POST['member_id']);
				$db->bind(':Interest', $_POST['interest_' . $interest['id'] ]);
				$db->execute();	
			}
		}


		//write to ttm_member_skills
		//first pull all interest to loop through
		$db->query('SELECT id FROM ttm_skills');
		$skills = $db->resultset();
		//loop through each interest
		foreach ($skills as $skill) {
			//test is the variable was posted
			if (isset($_POST['skill_' . $skill['id'] ]))
			{
				$db->query('INSERT INTO ttm_member_skills (member, skill) VALUES (:Member, :Skill) ');
				$db->bind(':Member', $_POST['member_id']);
				$db->bind(':Skill', $_POST['skill_' . $skill['id'] ]);
				$db->execute();	
			}
		}


		//check if our person has done a skills audit
		//test searching with matching http://stackoverflow.com/questions/2526772/search-for-string-within-text-column-in-mysql
		$db->query('SELECT id, note FROM ttm_member_notes WHERE note LIKE :Skills AND member = :Member');
		$db->bind(':Member', $_POST['member_id']);
		$db->bind(':Skills', "Completed skills audit");
		$memberNote = $db->single();

		if ($db->rowCount() == 0)
		{
			//write creation note
			$note = "Completed skills audit on " . date_format(date_create(), "g:i A, l j F, Y");
			$creator = "System";
			createNote($_POST['member_id'], $note, $creator, $date, $db);
		} else {

			$note = $memberNote['note'] . "\n\n" . "Updated skills audit on " . date_format(date_create(), "g:i A, l j F, Y");
			updateNote($_POST['member_id'], $note, "System", $date, $db);

		}

		

		//if write to DB succeeds, then display success message
		require_once('views/header.php');
		require_once('views/message_form_sent.php');
		require_once('views/footer.php');


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

		//create has of posted password
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

			$db->query('SELECT note from ttm_member_notes WHERE member = :MemberID AND note LIKE :Skills');
			$db->bind(':MemberID',$member['id']);
			$db->bind('Skills', "Completed skills audit");
			$skillsAudit = $db->single();

			

			//query to generate skills
			$db->query('SELECT id, skill, description FROM ttm_skills');
			$skills = $db->resultset();

			//query to generate interests 
			$db->query('SELECT id, interest, description FROM ttm_interests');
			$interests = $db->resultset();

			//print_r($rows);	
	
			//Load views
			//Load HTML header
			require_once('views/header.php');
			//load alert
			if ($db->rowCount() > 0)
			{
				$alert = "You've already completed the skills audit! If you attempt to complete the skills audit again your previous entries will be deleted.";
				$alertType = "alert-danger";
				require_once('views/alert.php');
			}
			//load form
			require_once('views/skills_audit_form.php');

			//Load HTML footer
			require_once('views/footer.php');
				
		}

	}


} else {
		//Display the entry point

		//$message['title'] = "Welcome to the TTM Skills Audit";
		//$message['body'] = file_get_contents('views/welcome.php');

		require_once('views/header.php');
		require_once('views/skills_audit_login_form.php');
		require_once('views/footer.php');
		die();
}




?>
