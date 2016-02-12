<?php
$output = shell_exec(sprintf('%s > /dev/null 2>&1 & echo $!','php emails.php rolsthoorn12@gmail.com 1 r r 10 1 < /dev/null &'));
?>