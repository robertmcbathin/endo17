<?php 
include_once 'admin_header.php';
$login = $psw = $error = '';
if (isset($_POST['login']))
{
	$login = $_POST['login'];
	$psw = $_POST['psw'];
	
	if ($login == "" || $psw == "")
	{
		$error = "Заполнены не все поля!<br />";
	}
	else
	{
	 /*   $salt = 'j4G6,k785';
	    $modified_psw = "$salt" . "$psw" . "$user";
        $psw_encoded = md5($modified_psw);*/
		$query = "SELECT username,psw FROM users
				  WHERE username='$login' AND psw='$psw'";

		if (mysql_num_rows(queryMysql($query)) == 0)
		{
			$error = "Логин или пароль недействительны, обратитесь к системному администратору. Может, что и подскажет<br />";
		}
		else
		{
			$_SESSION['user'] = $login;
			$_SESSION['psw'] = $psw;
                    /*    $user = $username;*/
                        die("<h4 align=center>Вы вошли как <a href='users.php?view=$login'>$_SESSION[user]</a></h4>");  
			/*die("You are now logged in. Please
			   <a href='users.php?view=$username'>click here</a>.");*/
		}
	}
}
?>
<div class="row" style="">
<form method='post' action='administration' >
    <p><?php echo $error;?></p>
    <p>ЛОГИН <strong>*</strong></p>
    <input class="pw" type="text" name='login' size="50" maxlength='200' value="<?php echo $login;?>"/>
    <p>ПАРОЛЬ <strong>*</strong></p>
    <input class="pw" type="password" name='psw' size="40" value="<?php echo $psw;?>"/>
    <input type="submit" class="button" id="button"  value="ВОЙТИ"/>
</form>
</div>
<?php
include_once 'admin_footer.php';
?>
