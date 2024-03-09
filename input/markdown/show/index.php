<html>
<body class="markdown-body">
<?php
if (isset($_GET['css']))
{
	echo '<link rel="stylesheet" href="github-markdown.css">';
}

include_once('parsedown.php');
$Parsedown = new Parsedown();

$data = file_get_contents("../draft.txt");
echo $Parsedown->text($data);
?>
</body>
</html>