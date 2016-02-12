<?php
$phone = $argv[1];
$frequency = $argv[2];
$firstname = $argv[3];
$lastname = $argv[4];
$interval = $argv[5];
$intervalUnit = $argv[6];

if ($intervalUnit == 2){
	$interval = $interval*60;
}
elseif($intervalUnit == 3){
	$interval = $interval*3600;
}
$emails = array($phone . '@txt.att.net',
	$phone . '@tmomail.net',
	$phone . '@vtext.com',
	$phone . '@messaging.sprintpcs.com', $phone . '@pm.sprint.com',
	$phone . '@vmobl.com',
	$phone . '@mmst5.tracfone.com',
	$phone . '@mymetropcs.com',
	$phone . '@myboostmobile.com',
	$phone . '@sms.mycricket.com',
	$phone . '@messaging.nextel.com',
	$phone . '@message.alltel.com',
	$phone . '@ptel.com',
	$phone . '@tms.suncom.com',
	$phone . '@qwestmp.com',
	$phone . '@email.uscc.net',
	);


include_once 'facts.php';
$count = 0;

     // we are the child
foreach ($facts as $fact) {
	sleep($interval);
	if ($count >= $frequency) {
		break;
	}
	foreach ($emails as $email) {
		mail($email, 'Subject', $comment, "From: " . $firstname . " " . $lastname);
	}
	$count = $count + 1;
}
?>