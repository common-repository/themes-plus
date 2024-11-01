<?php 

date_default_timezone_set('Europe/London');
//date_default_timezone_set('America/Los_Angeles'); // 8 hours behind UTC

header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1 
header("Expires: Fri, 1 Jan 2010 00:00:00 GMT"); // Date in the past 
$now = time() * 1000;

$end = strtotime( $_GET['date'] ) * 1000;

# We only need the difference in dates
echo $end - $now;
?>