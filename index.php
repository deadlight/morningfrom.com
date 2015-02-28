<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="stylesheets/screen.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <!--[if IE]>
      <link href="/stylesheets/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <![endif]-->

    <style type="text/css">
    </style>

</head>

<body>

<div class="bg"></div>
<div class="button">Find out</div>

<?php

$currentTime = new DateTime("now", new DateTimeZone('Europe/London'));
$currentHour = $currentTime->format('G');
$morning = 8;
$timeSinceGMTMorning = $morning - $currentHour;

$timezones = array();
$timezoneIdentifiers = DateTimeZone::listIdentifiers();
foreach ($timezoneIdentifiers as $identifier) {
	$timezoneObject = new DateTimeZone($identifier);
	$offset = $timezoneObject->getOffset($currentTime); //Offset, seconds
	$offsetHour = round($offset/3600);


	$timezones[$offsetHour][] = $identifier;
}

$selectedZone = $timezones[$timeSinceGMTMorning][array_rand($timezones[$timeSinceGMTMorning])];
$selectedZoneParts = explode('/', $selectedZone);

// echo "\n\nCurrent Hour: $currentHour. \n\n";

// echo "\n\nGood morning from $selectedZoneParts[1] ($selectedZoneParts[0])\n\n";


echo "\n\n<h1>Good morning from $selectedZoneParts[1]</h1>";
echo "<p>Inspired by <a href='http://xkcd.com/448/' target='_blank'>XKCD 448</a></p>";




exit;

?>

</body>

</html>