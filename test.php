<?php
$output = shell_exec(sprintf('%s > /dev/null 2>&1 & echo $!','php emails.php rolsthoorn12@gmail.com 5 r r 60 1 < /dev/null &'));
?>
