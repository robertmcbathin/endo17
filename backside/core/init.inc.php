<?session_start();
if(!isset($_SESSION['token']))
{
  $_SESSION['token'] = sha1(uniqid(mt_rand(),TRUE));
}
  include_once '../backside/config/db_connect.php';

?>