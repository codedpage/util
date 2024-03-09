<?php 
file_put_contents("CodedPage.java", $_POST['phpscript']);
@unlink('CodedPage.class'); 
system('javac CodedPage.java');

if (file_exists('CodedPage.class'))
	system('java CodedPage');
else 
	echo ("Compilation error");

?>