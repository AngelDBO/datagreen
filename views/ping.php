<?php
$ip =  "www.google.com";
exec("ping -n 4 $ip", $output, $status);
echo "<pre>";
print_r($output);


?>