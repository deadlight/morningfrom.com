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

//echo "\n\nCurrent Hour: $currentHour. \n\n";

//echo "\n\nGood morning from $selectedZoneParts[1] ($selectedZoneParts[0])\n\n";

echo "\n\n<h1>Good morning from $selectedZoneParts[1]</h1>";
echo "<p>Inspired by <a href='http://xkcd.com/448/' target='_blank'>XKCD 448</a></p>";
echo "<p><small>Another world-class public service provided by <a href='mailto:karl@deadlight.net'>Karl Williams</a>. Stay tuned for actual HTML and CSS.</small></p>";


exit;

?>
