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

//retrieve member data
$db->query('SELECT * FROM ttm_members');
$noMembers = $db->rowCount();
$ttmMembers = $db->resultset();

//retrieve and process skills and interests into arrays

$interests = processSkills("interests", $db);
$skills = processSkills("skills", $db);



//process suburb data
$suburbs = array(
	"Bayswater North" => 0,
	"Croydon" => 0,
	"Croydon Hills" => 0,
	"Croydon North" => 0,
	"Croydon South" => 0,
	"Heathmont" => 0,
	"Kilsyth South" => 0,
	"Ringwood" => 0,
	"Ringwood East" => 0,
	"Ringwood North" => 0,
	"Vermont" => 0,
	"Warranwood" => 0,
	"Wonga Park" => 0,
	"other" => 0,
	"not specified" => 0
);

foreach ($ttmMembers as $member) {
	if ($member['suburb'] == "")
	{
		$suburbs['not specified'] ++;
	} else {
		switch ($member['suburb']) {
			case 'Bayswater North':
				$suburbs['Bayswater'] ++;
				break;
			case 'Croydon':
				$suburbs['Croydon'] ++;
				break;
			case 'Croydon Hills':
				$suburbs['Croydon Hills'] ++;
				break;
			case 'Croydon North':
				$suburbs['Croydon North'] ++;
				break;
			case 'Croydon South':
				$suburbs['Croydon South'] ++;
				break;
			case 'Heathmont':
				$suburbs['Heathmont'] ++;
				break;
			case 'Kilsyth South':
				$suburbs['Kilsyth South'] ++;
				break;
			case 'Ringwood':
				$suburbs['Ringwood'] ++;
				break;	
			case 'Ringwood East':
				$suburbs['Ringwood East'] ++;
				break;
			case 'Ringwood North':
				$suburbs['Ringwood North'] ++;
				break;
			case 'Warranwood':
				$suburbs['Warranwood'] ++;
				break;
			case 'Wonga Park':
				$suburbs['Wonga Park'] ++;
				break;
			default:
				$suburbs['other'] ++;
				break;
		}

	}
}


//count members who have completed the skills audit.
$db->query('SELECT note * FROM ttm_member_notes WHERE note LIKE :searchString');
$db->bind(':searchString', "%Completed skills audit%");
$db->execute();
$noCompletedSkillsAudit = $db->rowCount();


//load views
	require_once('views/header.php');
	require_once('views/member_report_dashboard.php');
	require_once('views/footer.php');
	die();


?>
