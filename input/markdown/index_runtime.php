<?php session_start(); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>X-change</title>
<script language="javascript" src="jquery-1.10.2.js"></script>
</head>
<body onload="save()">
<form action="" method="post">
<table cellpadding="2" cellspacing="0" border="0" width="100%" style=" border:1px solid #005B8F; height:98%">
<? 
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
	<? } else { logged_in: $_SESSION['logged_in_exchange'] = true; ?>
	<tr height="500" valign="top">
		<td width="95%"><div style="width:100%; height:100%;"><textarea id="phpeditor" name="phpeditor" style="border:0px; width:100%; height:100%"><?php echo isset($_GET['temp']) ? '' : htmlentities(file_get_contents('draft.txt'))?></textarea></div></td> 				
	</tr>
	<? } ?>
</table>
</form>
</body>
</html>
<?php if (!isset($_GET['temp'])) : ?>	
<script>
function save() {
    setInterval(function(){ 
			$.post("php_draft_result.php",{phpscript:$("#phpeditor").val()}, function(txt){
				$("#phpeditor_result").html(txt);
			});
	}, 1000);
}
</script>
<?php endif; ?>