<?php session_start();?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Online Editor</title>
<script language="javascript" src="jquery.js"></script>
<style>
/*

D:\php_test\editorModule

*/
textarea{
	background: url(lineNo.png);
	background-attachment: local;
	background-repeat: no-repeat;
	padding-left: 30px;
	padding-top: 8.5px;
	border-color:#ccc;
}
</style>
</head>
<body>
<form action="" method="post">
<table cellpadding="0" cellspacing="0" border="0" width="100%" style=" border:1px solid #005B8F; height:98.5%">
<?php
	if (isset($_SESSION['logged_in_editor']) || 1 )
	{
		goto logged_in;
	}

	$c_time = time() + 0;
	if ( !isset($_POST['passcode']) || $_POST['passcode'] <> 'tanvi'.date("j", $c_time)) { ?>
 	<tr>
		<td colspan="3" align="center">Enter Passcode
		<input type="password"  size="40" name="passcode"><input type="submit" value="Go"></td>
	</tr>
	<?php } else { logged_in: $_SESSION['logged_in_editor'] = true; ?>
 	<tr bgcolor="#005B8F" style="color:#FFFFFF; height:30px;">
		<th>
		<?php 			
			/*<input type="radio" id="ej" name="etype" value="java" <?php echo isset($_POST['etype']) && $_POST['etype'] == 'java' ? 'checked="checked"' : '' ?>/><label for="ej">Java</label> &nbsp;&nbsp;&nbsp;
			<input type="radio" id="eh" name="etype" value="html" <?php echo isset($_POST['etype']) && $_POST['etype'] == 'html' ? 'checked="checked"' : '' ?>/><label for="eh">HTML</label> &nbsp;&nbsp;&nbsp;	
			<input type="radio" id="ec" name="etype" value="c" <?php echo isset($_POST['etype']) && $_POST['etype'] == 'c' ? 'checked="checked"' : '' ?>/><label for="ec">C</label>	&nbsp;&nbsp;&nbsp;
			<input type="radio" id="ecpp" name="etype" value="cpp" <?php echo isset($_POST['etype']) && $_POST['etype'] == 'cpp' ? 'checked="checked"' : '' ?>/><label for="ecpp">C++</label> &nbsp;&nbsp;&nbsp;	
			<input type="radio" id="ego" name="etype" value="go" <?php echo isset($_POST['etype']) && $_POST['etype'] == 'go' ? 'checked="checked"' : '' ?>/><label for="ego">Go</label> &nbsp;&nbsp;&nbsp;	
			<input type="submit" style="float:right;" name ="load" value="Load" />			
			<input type="radio" id="ego" name="etype" value="go" <?php echo isset($_POST['etype']) && $_POST['etype'] == 'go' ? 'checked="checked"' : '' ?>/><label for="ego">Go</label> &nbsp;&nbsp;&nbsp;	
			*/ ?>
			<input type="radio" id="eh" name="etype" value="html" <?php echo isset($_POST['etype']) && $_POST['etype'] == 'html' ? 'checked="checked"' : (!isset($_POST['etype']) ? 'checked="checked"' : '') ?>/><label for="eh">Text</label> &nbsp;&nbsp;&nbsp;	
			<input type="radio" id="ep" name="etype" value="php"  <?php echo isset($_POST['etype']) && $_POST['etype'] == 'php' ? 'checked="checked"' : (!isset($_POST['etype']) ? '' : '') ?>/><label for="ep">Tab - A</label> &nbsp;&nbsp;&nbsp;						
			<input type="radio" id="ep5" name="etype" value="php5"  <?php echo isset($_POST['etype']) && $_POST['etype'] == 'php5' ? 'checked="checked"' : (!isset($_POST['etype']) ? '' : '') ?>/><label for="ep5">Tab - B</label> &nbsp;&nbsp;&nbsp;
			<input type="radio" id="ep7" name="etype" value="php7"  <?php echo isset($_POST['etype']) && $_POST['etype'] == 'php7' ? 'checked="checked"' : (!isset($_POST['etype']) ? '' : '') ?>/><label for="ep7">Tab - C</label> &nbsp;&nbsp;&nbsp;						
			<input type="submit" style="float:right;" name ="load" value="Load" />
		
		</th>
		<th>
		<input style="float:left;" type="button" id="reset" value="Reset" />
		<input style="float:left;" type="button" id="execute" value="Result" />		
		</th>			
	</tr>
	<tr height="500" valign="top">
		<td width="50%"><div style="width:100%; height:100%;">
		
<?php

$loaded_file = isset($_POST['etype']) ? $_POST['etype'].'/'.$_POST['etype'].'World.'.$_POST['etype'] : 'php/phpWorld.php';

/*
switch ($_POST['etype']) {
	case "php5" : 
	
	//$loaded_file =  'php5/phpWorld.php5';
}*/

if ( 0 <> filesize($loaded_file) )
{
	echo '<textarea id="phpeditor" name="phpeditor" style="border:0px; width:100%; height:100%">'.file_get_contents($loaded_file).'</textarea>';
} else { 
?>
		<textarea title="b" id="phpeditor" name="phpeditor" style="border:0px; width:100%; height:100%">$a = array(1,2,3,4);

echo "<pre>";
print_r($a);
echo "</pre>";</textarea>
<?php } ?>
</div>
</td> 		
		<td width="50%" style="width:100%; height:100%; border-left:1px solid #005B8F"><div id="phpeditor_result"></div></td>
	</tr>
	<?php } ?>
</table>
</form>
</body>
</html>

<script>
$(document).ready(function () {
	$('#execute').click(function() {
		var etype =  $("[name=etype]:checked").val();
		 
		$("#phpeditor_result").html('');
		if (etype == "html")
		{
			$("#phpeditor_result").css("white-space", "normal");
			$("#phpeditor_result").html($("#phpeditor").val());			
			$.post(etype+"/editor_result_"+etype+".php",{phpscript:$("#phpeditor").val()}, function(txt){});						
		} 
		else		
		{
			$.post(etype+"/editor_result_"+etype+".php",{phpscript:$("#phpeditor").val()}, function(txt){
				$("#phpeditor_result").html(txt);
			});
		}
	});   
	
	$('#phpeditor').keydown(function(e) {
	
		if(e.keyCode == 27)
		$('#execute').click();
	});	
	
	$("#reset").click(function(){ 
		var etype =  $("[name=etype]:checked").val();
		$.post(etype+"/reset_"+etype+".php", function(txt){
			$('#phpeditor').val(txt);
		});
	});  		
}); 
</script>


<?php /*?>http://api.ipinfodb.com/v2/ip_query.php?key=c2198f8881f5ffef78f6a2038ad4aee80f0f3e795e634fcb42edfdc489ee9f79&ip=112.110.54.32&timezone=false<?php */?>
