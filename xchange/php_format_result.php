<?php file_put_contents("draft.txt", stripslashes($_POST['phpscript']));
echo file_get_contents("draft.txt");
?>