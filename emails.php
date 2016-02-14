<?php

require_once ('class.phpmailer.php');


$phone = escapeshellcmd($argv[1]);
$frequency = escapeshellcmd($argv[2]);
$firstname = escapeshellcmd($argv[3]);
$lastname = escapeshellcmd($argv[4]);
$interval = escapeshellcmd($argv[5]);
$intervalUnit = escapeshellcmd($argv[6]);

if ($intervalUnit == 2){
	$interval = $interval*60;
}
elseif($intervalUnit == 3){
	$interval = $interval*3600;
}
$emails = array($phone );//. '@txt.att.net',
	// $phone . '@tmomail.net',
	// $phone . '@vtext.com',
	// $phone . '@messaging.sprintpcs.com', $phone . '@pm.sprint.com',
	// $phone . '@vmobl.com',
	// $phone . '@mmst5.tracfone.com',
	// $phone . '@mymetropcs.com',
	// $phone . '@myboostmobile.com',
	// $phone . '@sms.mycricket.com',
	// $phone . '@messaging.nextel.com',
	// $phone . '@message.alltel.com',
	// $phone . '@ptel.com',
	// $phone . '@tms.suncom.com',
	// $phone . '@qwestmp.com',
	// $phone . '@email.uscc.net',
	// );


include_once 'facts.php';
$count = 0;

shuffle($facts);
foreach ($emails as $emailID) {
	//mail($email, '', "You have been subscribed to Useless Facts by an enemy!\nThe message will occur ".$frequency." times, every ".$interval." seconds", "");
	
	$mail = new PHPMailer;
	$mail->setFrom('from@example.com');
	$mail->addAddress($emailID);

	$mail->Subject = "Facts";
	//error_log("ASDF");
	$mail->Body ="You have been subscribed to Useless Facts by an enemy!\nThe message will occur ".$frequency." times, every ".$interval." seconds";

	if(!$mail->send()) {
		echo 'Message was not sent.';
		echo 'Mailer error: ' . $mail->ErrorInfo;
	} else {
		echo 'Message has been sent.';
	}
	// mail("greatherbob@gmail.com", '', "You have been subscribed to Useless Facts by an enemy!\nThe message will occur ".$frequency." times, every ".$interval." seconds", "");
	// error_log( "Subscription successful");
}
foreach ($facts as $fact) {
	$fact = wordwrap($fact, 70, "\r\n");
	
	if ($count >= $frequency) {
		break;
	}

	sleep($interval);
	foreach ($emails as $emailID) {
		$mail->setFrom($firstname . "" . $lastname.'from@example.com');
		$mail->addAddress($emailID);
		$mail->Subject = "Facts";
		$mail->Body = $fact;
		if(!$mail->send()) {
			echo 'Message was not sent.';
			echo 'Mailer error: ' . $mail->ErrorInfo;
		} else {
			echo 'Message has been sent.';
		}
		//mail($email, 'Useless Facts', $fact, "From: " . $firstname . " " . $lastname);
		error_log($fact);
	}
	$count = $count + 1;
}
?>