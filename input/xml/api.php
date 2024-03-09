<?php
header("Content-Type: application/xml; charset=UTF-8");
$data = file_get_contents("draft.txt");
echo  $data;
exit;