<?php
$dir_handle = @opendir($ROOT) or die("Unable to open $ROOT");

// file array
$files 	= array();		
$today 	= date("l : j-F g:i a");


// exclues
$excluded = array(".", "..", ".DS_Store", "index.php", "create.php", "list.php", "del.php", "dir.php", "save.php", "config.php", "jquery.js");

// Loop through the files
while ($file = readdir($dir_handle)) 
{
	if (!in_array($file, $excluded))
	{ 
		$files[] = $file;
	}
}

// sort
sort($files);	

foreach($files as $f) 
{		
	$index = (int) filter_var($f, FILTER_SANITIZE_NUMBER_INT); 
	$filess[$index] = trim($f);
}

ksort($filess); 
echo "<div>";
echo "<span class='time'>$today</span>";
foreach($filess as $k =>  $f) 
{
	$index = (int) filter_var($f, FILTER_SANITIZE_NUMBER_INT); 		
	$class = "inline";
	if ($k % 100 == 0) {
			$class = "b";			 
	} 

	if(!filesize($ROOT.$f)) {
		$class .= " i"	;
	}
	echo "<div class='$class' ><a  href='$BASE_URL/?q=".$index."'>".trim($f)."</a></div>";
	
}
closedir($dir_handle);
echo "</div>";
?> 

<style>
 
div {
  text-align: justify;
  text-justify: inter-word;
}


div.b {
    margin-top: 30px;
    font-weight: bold;
	clear:both;
}

div.inline {
    display: inline;
    float: left; 
	margin-left:10px;
}

.time  {
	display: block;
	color: #acacac;
}

div.i {
	font-style: italic;
}

a{
	text-decoration: none;
}

 /* unvisited link */
 a:link {
  color: black;
}

/* visited link */
a:visited {
  color: black;
}

/* mouse over link */
a:hover {
  color: hotpink;
}

/* selected link */
a:active {
  color: blue;
} 

</style>

