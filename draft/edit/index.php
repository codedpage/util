<?php header('Content-Type: text/html; charset=utf-8'); session_start(); 

if (!isset($_GET['q'])){
	header("Location: dir.php"); 
	exit();
}

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo isset($_GET['q']) ? "D".$_GET['q'] : 'Draft'?></title>
<script language="javascript" src="jquery.js"></script>
</head>
<body>
<form action="" method="post">
<table cellpadding="2" cellspacing="0" border="0" width="100%" style="border:1px solid #005B8F; height:98%">
<?php 
	if (isset($_SESSION['logged_in_exchange']) || 1)
	{
		goto logged_in;
	}

	$c_time = time() + 0;
	if ( !isset($_POST['passcode']) || $_POST['passcode'] <> 'tanvi'.date("j", $c_time)) { ?>
 	<tr>
		<td colspan="3" align="center">Enter Passcode
		<input type="password"  size="40" name="passcode"><input type="submit" value="Go"></td>
	</tr>
	<?php } else { logged_in: $_SESSION['logged_in_exchange'] = true; ?>
	<tr height="500" valign="top">
	<?php $draftFileNo =  isset($_GET['q']) ? $_GET['q'] : ''?> 
		<td width="95%"><div style="width:100%; height:100%;"><textarea id="phpeditor" name="phpeditor" style="border:0px; width:100%; height:100%"><?php echo isset($_GET['temp']) ? '' : @htmlentities(file_get_contents('draft'.$draftFileNo.'.txt'))?></textarea></div></td> 				
	</tr>
	<?php } ?>
</table>
</form>
</body>
</html>
<?php if (!isset($_GET['temp'])) : ?>	
<script>
$('#phpeditor').keydown(function(e) {

	if(e.keyCode == 27)
	{					
			$.post("save.php",{<?php echo isset($_GET['q']) ? "q:".$_GET['q']."," : ''?> phpscript:$("#phpeditor").val()}, function(txt){
				$("#phpeditor_result").html(txt);
			});
	}
});
</script>
<?php endif; ?>