<?php
# Set default timezone
date_default_timezone_set('Europe'); // 8 hours behind UTC

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>jCountdown - jQuery Countdown Plugin Demos</title>
	<!--<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">-->
	<link rel="stylesheet" href="js/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="js/bootstrap/dist/css/bootstrap-theme.min.css">

	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="../dist/jquery.jcountdown.js"></script>
	<script src="js/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="x-template" id="template">

		<div class="year-timer timer-section">
			<span class="time">%y</span> : <span>%ty</span>
		</div>
		<div class="month-timer timer-section">
			<span class="time">%m</span> : <span>%tm</span>
		</div>
		<div class="day-timer timer-section">
			<span class="time">%d</span> <span>%td</span>
		</div>
		<div class="hour-timer timer-section">
			<span class="time">%h</span> : <span>%th</span>
		</div>
		<div class="min-timer timer-section">
			<span class="time">%i</span> : <span>%ti</span>
		</div>
		<div class="second-timer timer-section">
			<span class="time">%s</span> : <span>%ts</span>
		</div>

	</script>
	<script type="text/javascript">
		$(document).ready(function() {

			<?php

			$date = "January 5, 2016 12:00:00";

			$server_time = (time() * 1000 );
			$server_time_end = (strtotime( $date ) * 1000 );

			$diff = $server_time_end - $server_time;

			?>

			$("#timer").countdown({
				date: "<?php echo $date;?>",
				yearsAndMonths: true,
				serverDiff: <?php echo $diff;?>,
				template: $('#template').html()
			});

		});
	</script>
	<style>
		#timer {
			margin: 20px auto;
		}
		.timer-section {
			display: inline-block;
		}
		.timer-section span {
			background-color: #ffffff;
			padding: 5px 4px;
			border-radius: 5px;
		}
		.time {
			font-weight: bold;
		}
	</style>
</head>
<body>

<div class="container">
	<div class="row">
		<div class="jumbotron">

			<h1 class="text-center">jCountdown</h1>

			<p>Server Time Demo</p>

			<p>
				This demo shows you how to get the countdown timer to match the server time by passing the
				difference of server time to the plugin.
			</p>

			<div id="timer" class="text-center"></div>

		</div>


		<h2>Setup</h2>

		<p>The simplest setup is by doing the following:</p>

<pre>
//HTML

&lt;p id="timer"&gt;&lt;/p&gt;
</pre>

<pre>
&lt;?php

$date = "January 5, 2016 12:00:00";

$server_time = (time() * 1000 );
$server_time_end = (strtotime( $date ) * 1000 );

$diff = $server_time_end - $server_time;

?&gt;

$("#timer").countdown({
	date: "&lt;?php echo $date;?&gt;",
	serverDiff: &lt;?php echo $diff;?&gt;
});
</pre>

	</div>

</div>

</body>
</html>