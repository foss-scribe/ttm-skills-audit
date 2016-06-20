<?php

date_default_timezone_set("Australia/Melbourne");

require_once('../inc/config.dev.php');
include('../inc/functions.php');
require_once('../inc/db.class.php');

$db = new DB();

if ($_FILES[csv][size] > 0) { 

    //get the csv file 
    $file = $_FILES[csv][tmp_name]; 
    $handle = fopen($file,"r"); 

    //create a timestamp
    $date = date("Y-m-d H:i:s");
     
    //loop through the csv file and insert into database 
    do { 
        if ($data[0]) { 
            $db->query("INSERT INTO ttm_members (
            	firstname,
            	lastname,
            	address,
            	postcode,
            	suburb,
            	email,
            	phone,
            	mobile,
            	member_type,
            	date_created) VALUES 
                ( 
                    '".addslashes($data[0])."', 
                    '".addslashes($data[1])."', 
                    '".addslashes($data[2])."',
                    '".addslashes($data[3])."',
                    '".addslashes($data[4])."',
                    '".addslashes($data[5])."',
                    '".addslashes($data[6])."',
                    '".addslashes($data[7])."',
                    'subscriber',
                    '".$date."'
                ) 
            ");
            $db->execute();

            //get last user ID
            $newUserID = $db->lastInsertId();

            //create a note for import event
            $note = $data[0] . " was imported from Gmail in batch mode " . date_format(date_create(), "g:i A, l j F, Y") . "\n\n";
            $creator = "System";
            
            createNote($newUserID, $note, $creator, $date, $db);

            //import notes from database
            if($data[8] != ""){
            	$note = addslashes($data[8]);
            $note .= "\n\n NOTE ADDED BY SYSTEM AS PART OF BULK IMPORT FROM GMAIL";
            createNote($newUserID, $note, $creator, $date, $db);
            }
            

        } 
    } while ($data = fgetcsv($handle,1000,",","'")); 
    // 

    //redirect 
    header('Location: ' . $_SERVER['PHP_SELF'] . '?success=1'); die; 

}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<title>Import a CSV File with PHP &amp; MySQL</title> 
</head> 

<body> 

<?php if (!empty($_GET[success])) { echo "<b>Your file has been imported.</b><br><br>"; } //generic success notice ?> 

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" name="form1" id="form1"> 
  Choose your file: <br /> 
  <input name="csv" type="file" id="csv" /> 
  <input type="submit" name="Submit" value="Submit" /> 
</form> 

</body> 
</html> 