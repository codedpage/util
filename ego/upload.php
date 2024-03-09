<?php

#$target_dir = "./";
$target_dir = "./uploads/"; //within ego
//$target_dir = "../uploads/"; //upper level

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if ($imageFileType == "php") {
	die("Not allowed");
}

if (isset($_POST["submit"])) {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        #if ($imageFileType <> "php" && move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

        if (in_array($imageFileType, ["log", "php"])) {
            rename($target_file, $target_file . "s.txt");
        }
        echo "Done";
    } else {
        echo "Sorry";
    }
}
?>
<br>
<a href="index.php">Dashboard</a><br />
<a href="../uploads">Uploads</a>