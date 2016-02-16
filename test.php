<?php

function debug_to_console( $data ) {

	if ( is_array( $data ) )
		$output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
	else
		$output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

	echo $output;
}

$output = shell_exec("php /usr/share/nginx/html/UselessFacts/emails.php rolsthoorn12@gmail.com 5 r r 10 2 'alert' >> /log/uselessfacts.log &");

debug_to_console($output);
?>
