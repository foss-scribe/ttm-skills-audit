<!DOCTYPE html>
<html>
<head>
	<title><?php echo $data['page_title']; ?></title>

	<!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Javascripts -->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
<script src="assets/js/jquery.easy-autocomplete.min.js"></script> 

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">

      // Load Charts and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Draw graphs
      google.charts.setOnLoadCallback(drawSuburbChart);
      google.charts.setOnLoadCallback(drawInterestsChart);
      google.charts.setOnLoadCallback(drawSkillsChart);

      // Callback that draws the pie chart for Suburbs's pizza.
      function drawSuburbChart() {

        // Create the data table for Suburbs
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Suburb');
        data.addColumn('number', 'Count');
        data.addRows([
        	<?php
        		foreach ($suburbs as $suburb => $count)
        		{
        			echo "['" . $suburb . "', $count],";
        		}
        	?>

        ]);

        // Set chart options
        var options = {'title':'TTM Members by suburb',
                       'width':600,
                       'height':400};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_Suburb'));
        chart.draw(data, options);
      }

      // Callback that draws the pie chart Interests
      function drawInterestsChart() {

        //Create data for Interests Chart
        var data = new google.visualization.DataTable();
       data.addColumn('string', 'Interest');
        data.addColumn('number', 'Count');
        data.addRows([
        	<?php
        		foreach ($interests as $interest)
        		{
        			echo "['" . $interest['interest'] . "', " . $interest['count'] ."],";
        		}
        	?>

        ]);

        // Set chart options
        var options = {'title':'TTM Member Interests',
                       'width':600,
                       'height':400};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('graph_Interests'));
        chart.draw(data, options);
      }

      // Callback that draws the pie chart skills
      function drawSkillsChart() {

        //Create data for Interests Chart
        var data = new google.visualization.DataTable();
       data.addColumn('string', 'Skill');
        data.addColumn('number', 'Count');
        data.addRows([
        	<?php
        		foreach ($skills as $skill)
        		{
        			echo "['" . $skill['skill'] . "', " . $skill['count'] ."],";
        		}
        	?>

        ]);

        // Set chart options
        var options = {'title':'TTM Member Skills',
                       'width':600,
                       'height':400};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('graph_Skills'));
        chart.draw(data, options);
      }
    </script>


<link rel="stylesheet" href="assets/css/easy-autocomplete.min.css"> 


<!-- reCAPTCHA -->
<script src='https://www.google.com/recaptcha/api.js'></script>

<style type="text/css">
	.error {
		color: red;
		font-weight: lighter;
		font-style: italic;
	}

	.navbar {
		padding-bottom: 0px;
		margin-bottom: 0px;
		min-height: 35px
	}

	.jumbotron{
		background-image: url("assets/img/DSC_3687.jpg");
		background-repeat: no-repeat;
		background-position: center top;

	}

	.jumbotron div h2, .jumbotron div p{
		text-align: center;
		color: white;
	}

	.jumbotron div h2 {
		font-size: 32pt;
	}


</style>

</head>
<body>

<!-- facebook API -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<?php include('views/navbar.php'); ?>

<div class="jumbotron">
  <div class="container">
    <h2>TRANSITION TOWNS MAROONDAH INC.</h2>
	<p>Creating resilient and sustainable communities</p>
  </div>
</div>

<div class="container">

