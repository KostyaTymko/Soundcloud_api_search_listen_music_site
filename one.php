<?php /*session_start();*/
print_r($_POST);

    if (isset($_POST['myActionName']))
    {
    	echo '111111';
        // делаете что угодно
    }
        if (isset($_POST['myActionName2']))
    {
    	echo '222222';
        // делаете что угодно
    }
?>


<form action="/one.php" method="POST">
     <input name="myActionName" type="submit" value="Выполнить" />
</form>
<form action="/one.php" method="POST">
     <input name="myActionName2" type="submit" value="Выполнить" />
</form>
