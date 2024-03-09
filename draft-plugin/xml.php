<?php
header("Content-Type: application/xml; charset=UTF-8");
$data = file_get_contents("/opt/homebrew/var/www/draft/edit/draft5.txt");
echo  $data;
exit;