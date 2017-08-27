<?php
include_once 'admin_header.php';
echo <<<_END
<script>
function getXmlHttp(){
  var xmlhttp;
  try {
    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
  } catch (e) {
    try {
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (E) {
      xmlhttp = false;
    }
  }
  if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
    xmlhttp = new XMLHttpRequest();
  }
  return xmlhttp;
}
function ajaxRequest()
{
	try
	{
		var request = new XMLHttpRequest()
	}
	catch(e1)
	{
		try
		{
			request = new ActiveXObject("Msxml2.XMLHTTP")
		}
		catch(e2)
		{
			try
			{
				request = new ActiveXObject("Microsoft.XMLHTTP")
			}
			catch(e3)
			{
				request = false
			}
		}
	}
	return request
}
function ToModal(rid)
{
        p = $('.popup-overlay')
        p.css('display', 'block')
	params  = "rid=" + encodeURIComponent(rid)
	var request = getXmlHttp()
	request.open("POST", "request_in_modal.php", true)
	request.setRequestHeader("Content-type",
		"application/x-www-form-urlencoded")
	request.onreadystatechange = function()
	{
		if (this.readyState == 4)
		{
			if (this.status == 200)
			{
				if (this.responseText != null)
				{
					document.getElementById('popup').innerHTML =
						this.responseText
				}
				else alert("Ajax error: No data received")
			}
			else alert( "Ajax error: " + this.statusText)
		}
	}
	request.send(params)
}
function AppToModal(aid)
{
        a = $('.app-popup-overlay')
        a.css('display', 'block')
	params  = "aid=" + encodeURIComponent(aid)
	var app_request = getXmlHttp()
	app_request.open("POST", "appointment_in_modal.php", true)
	app_request.setRequestHeader("Content-type",
		"application/x-www-form-urlencoded")
	app_request.onreadystatechange = function()
	{
		if (this.readyState == 4)
		{
			if (this.status == 200)
			{
				if (this.responseText != null)
				{
					document.getElementById('app-popup').innerHTML =
						this.responseText
				}
				else alert("Ajax error: No data received")
			}
			else alert( "Ajax error: " + this.statusText)
		}
	}
	app_request.send(params)
}
function ApplyChanges(rid)
{
	params  = "rid=" + encodeURIComponent(rid)
	var request = getXmlHttp()
	request.open("POST", "apply_changes.php", true)
	request.setRequestHeader("Content-type",
		"application/x-www-form-urlencoded")
	request.onreadystatechange = function()
	{
		if (this.readyState == 4)
		{
			if (this.status == 200)
			{
				if (this.responseText != null)
				{
					document.getElementById('popup').innerHTML =
						this.responseText
				}
				else alert("Ajax error: No data received")
			}
			else alert( "Ajax error: " + this.statusText)
		}
	}
	request.send(params)
}
</script>
_END;
if (isset($_SESSION['user'])) 
    {$user = $_SESSION['user']; } 
else 
    {$user = 'unregistered15';}
if (isset($_GET['view']))
{
	$view = sanitizeString($_GET['view']);
}
if(isset($_POST['save_request'])){
    $add_fio         = $_POST['add_fio'];
    $add_phone       = $_POST['add_phone'];
    $add_frommail    = $_POST['add_frommail'];
    $add_direction   = $_POST['add_direction'];
    $add_desireddate = $_POST['add_desireddate'];
    $add_begin_time  = $_POST['add_begin_time'];
    $add_end_time    = $_POST['add_end_time'];
    $add_comment     = $_POST['add_comment'];
    $to              = 'registry@endoscopy21.ru';
    $date_of_receive = date("y.m.d H:i:s");
    $add_query = "INSERT INTO request VALUES('','$to', '$add_frommail','$add_fio','$add_phone', '$date_of_receive','$add_direction', '$add_desireddate', '$add_begin_time', '$add_end_time','$add_comment','new')";
    $add_result = queryMysql($add_query);
    if($add_result){
        die('Заявка добавлена');
    }
 else {
    die('Произошла ошибка, заявка не добавлена');    
    }
}
if(isset($_POST['save_appointment'])){
    $add_fio_app         = $_POST['add_fio_app'];
    $add_phone_app       = $_POST['add_phone_app'];
    $add_frommail_app    = $_POST['add_frommail_app'];
    $add_direction_app   = $_POST['add_direction_app'];
    $add_doctor          = $_POST['add_doctor_app'];
    $add_date            = $_POST['add_date'];
    $add_begin_time_app      = $_POST['add_begin_time'];
    $add_end_time_app        = $_POST['add_end_time'];
    $add_cost_app = $_POST['add_cost'];
    $add_comment_app     = $_POST['add_comment_app'];
    $add_app_query = "INSERT INTO appointment VALUES('','$add_fio_app', '$add_phone_app','$add_frommail_app','$add_direction_app', '$add_doctor', '$add_date', '$add_begin_time_app', '$add_end_time_app','$add_comment_app','назначено','$add_cost_app','')";
    $add_result = queryMysql($add_app_query);
    if($add_result){
        die('Назначение добавлено');
    }
 else {
        die('Произошла ошибка, назначение не добавлено');    
    }
}
?>
<aside id="navi">
    <nav>
        <a href="#requests">ЗАЯВКИ</a>
        <a href="#appointments">НАЗНАЧЕНИЯ</a>
        <a href="#graphic">ГРАФИК ВРАЧЕЙ</a>
        <a href="#reports">ОТЧЁТНОСТЬ</a>
    </nav>
    <p align="center">version 1.0</p>
</aside>
<div id="main-content">
<div id='requests'>  
    <h2>ЗАЯВКИ</h2>
    <hr>
    <input type="button" name="add_request" onclick="AddRequestToggle()" value="Добавить заявку">
    <div id="add-request">
        <?php
       echo "<form method='post' action='$SERVER[PHP_SELF]' id='ModalForm'>";
       echo       "<div class='field'>";
       echo     "<label for='add_fio'>ФИО</label><input type='text' name='add_fio' id='add_fio' size='40' value='$add_fio'>";
       echo       "</div>";
       echo       "<div class='field'>";
       echo     "<label for='add_phone'>Телефон: </label><input type='text' value='$add_phone' size='10' id='add_phone' name='add_phone'>";
       echo       "</div>";
       echo       "<div class='field'>";
       echo     "<label for='add_frommail'>Электронная почта: </label><input type='text' value='$add_frommail' size='50' id='add_frommail' name='add_frommail'>";
       echo       "</div>";
       echo       "<div class='field'>";
       echo     "<label for='add_direction'>Направление обследования: </label><input type='text' value='$add_direction' size='30' id='add_direction' name='add_direction'>";
       echo       "</div>";
       echo       "<div class='field'>";
       echo     "<label for='add_desireddate'>Желаемая дата приёма: </label><input type='date' id='add_desireddate' value='$add_desireddate' name='add_desireddate'>";
       echo       "</div>";
       echo       "<div class='field'>";
       echo     "<label for='add_begin_time'>Время начала приёма: </label><input type='time' id='add_begin_time' value='$add_begin_time' name='add_begin_time'>";
       echo       "</div>";
       echo       "<div class='field'>";
       echo     "<label for='add_begin_time'>Время окончания приёма: </label><input type='time' id='add_end_time' value='$add_end_time' name='add_end_time'>";
       echo       "</div>";
       echo       "<div class='field'>";
       echo     "<label for='add_comment'>Комментарий: </label><textarea id='add_comment' cols='50' name='add_comment'>$add_comment</textarea>";
       echo       "</div>";
       echo   "<input type='submit' value='Сохранить' name='save_request'>";
       echo "</form>";
                ?>
    </div>
    <?php
      $requests     = "SELECT * FROM request";
      $result       = queryMysql($requests);
      $selected_rid = '';
      if (mysql_num_rows($result)){
         if ($result){
                  echo "<table>";         
                  echo "<tr><td>Номер</td><td>ФИО</td><td>Телефон</td><td>Электронная почта</td><td>Получено</td><td>Направление</td><td>Желаемая дата приёма</td><td>Начало</td><td>Окончание</td><td>Комментарий</td><td>Статус</td></tr>";
                  while ($q = mysql_fetch_assoc($result)){
                  echo "<tr id='r$q[rid]' onclick='ToModal($q[rid])'><td id='popup-toggle'>$q[rid]</td><td>$q[fio]</td><td>$q[phone]</td><td>$q[frommail]</td><td>$q[date_of_receive]</td><td>$q[direction]</td><td>$q[desireddate]</td><td>$q[begin_time]</td><td>$q[end_time]</td><td>$q[comment]</td><td>$q[status]</td></tr>";
                 }
                  /*
                  echo "<tr><td>Номер</td><td>$q[rid]</td></tr>";
                  echo "<tr><td>ФИО</td><td>$q[fio]</td></tr>";
                  echo "<tr><td>Номер телефона</td><td>$q[phone]</td></tr>";
                  echo "<tr><td>Электронная почта</td><td>$q[frommail]</td></tr>";
                  echo "<tr><td>Получено</td><td>$q[date_of_receive]</td></tr>";
                  echo "<tr><td>Направление обследования</td><td>$q[direction]</td></tr>";
                  echo "<tr><td>Желаемая дата приёма</td><td>$q[desireddate]</td></tr>";
                  echo "<tr><td>Комментарий</td><td>$q[comment]</td></tr>";
                  echo "<tr><td>Статус заявки</td><td>$q[status]</td></tr>";*/
               /*  $q['rid'] . ' ' . $q['frommail'] . ' ' . $q['fio'] . ' ' . $q['phone'] . ' ' . $q['direction'];*/
                  echo "</table>";
                  echo "<br/>";
                  echo "<div class='popup-overlay'>";
                  echo "<div class='popup' id='popup'>";
                  echo "<h1>Данные о заявке </h1>";
                  echo "</div></div>";
           }
      }
      else{
          echo "Новых заявок нет";
      }
    ?>
</div>
<div id='appointments'>  
    <h2>НАЗНАЧЕНИЯ</h2>
    <hr>
    <input type="button" name="add_appointment" onclick="AddAppointmentToggle()" value="Добавить назначение">
    <div id="add-appointment">
        <?php
       echo "<form method='post' action='$SERVER[PHP_SELF]' id='add-app-form'>";
       echo       "<div class='field'>";
       echo     "<label for='add_fio'>ФИО</label><input type='text' name='add_fio_app' id='add_fio_app' size='40' value='$add_fio_app'>";
       echo       "</div>";
       echo       "<div class='field'>";
       echo     "<label for='add_phone'>Телефон: </label><input type='text' value='$add_phone_app' size='10' id='add_phone_app' name='add_phone_app'>";
       echo       "</div>";
       echo       "<div class='field'>";
       echo     "<label for='add_frommail'>Электронная почта: </label><input type='text' value='$add_frommail_app' size='50' id='add_frommail_app' name='add_frommail_app'>";
       echo       "</div>";
       echo       "<div class='field'>";
       echo     "<label for='add_direction_app'>Направление обследования: </label><input type='text' value='$add_direction_app' size='30' id='add_direction_app' name='add_direction_app'>";
       echo       "</div>";
       echo       "<div class='field'>";
       echo     "<label for='add_doctor'>Принимающий врач: </label><input type='text' value='$add_doctor' size='40' id='add_doctor_app' name='add_doctor_app'>";
       echo       "</div>";
       echo       "<div class='field'>";
       echo     "<label for='add_date'>Дата приёма: </label><input type='date' id='add_date' value='$add_date' name='add_date'>";
       echo       "</div>";
       echo       "<div class='field'>";
       echo     "<label for='add_begin_time'>Время начала приёма: </label><input type='time' id='add_begin_time' value='$add_begin_time_app' name='add_begin_time'>";
       echo       "</div>";
       echo       "<div class='field'>";
       echo     "<label for='add_end_time'>Время окончания приёма: </label><input type='time' id='add_end_time' value='$add_end_time_app' name='add_end_time'>";
       echo       "</div>";
       echo       "<div class='field'>";
       echo     "<label for='add_cost'>Стоимость: </label><input type='text' id='add_cost' value='$add_cost_app' name='add_cost'>";
       echo       "</div>";
       echo       "<div class='field'>";
       echo     "<label for='add_comment_app'>Комментарий: </label><textarea id='add_comment_app' cols='50' name='add_comment_app'>$add_comment_app</textarea>";
       echo       "</div>";
       echo   "<input type='submit' value='Сохранить' name='save_appointment'>";
       echo "</form>";
                ?>
    </div>
    <?php
      $apps     = "SELECT * FROM appointment";
      $result       = queryMysql($apps);
      $selected_aid = '';
      if (mysql_num_rows($result)){
         if ($result){
                  echo "<table>";         
                  echo "<tr><td>Номер</td><td>ФИО</td><td>Телефон</td><td>Электронная почта</td><td>Направление</td><td>Врач</td><td>дата</td><td>время начала</td><td>время окончания</td><td>Стоимость</td><td>Комментарий</td><td>Статус</td></tr>";
                  while ($q = mysql_fetch_assoc($result)){
                  echo "<tr id='a$q[aid]' onclick='AppToModal($q[aid])'><td id='app-popup-toggle'>$q[aid]</td><td>$q[fio]</td><td>$q[phone]</td><td>$q[email]</td><td>$q[direction]</td><td>$q[doctor]</td><td>$q[date]</td><td>$q[begin_time]</td><td>$q[end_time]</td><td>$q[cost]</td><td>$q[comment]</td><td>$q[status]</td></tr>";
                 }
                  /*
                  echo "<tr><td>Номер</td><td>$q[rid]</td></tr>";
                  echo "<tr><td>ФИО</td><td>$q[fio]</td></tr>";
                  echo "<tr><td>Номер телефона</td><td>$q[phone]</td></tr>";
                  echo "<tr><td>Электронная почта</td><td>$q[frommail]</td></tr>";
                  echo "<tr><td>Получено</td><td>$q[date_of_receive]</td></tr>";
                  echo "<tr><td>Направление обследования</td><td>$q[direction]</td></tr>";
                  echo "<tr><td>Желаемая дата приёма</td><td>$q[desireddate]</td></tr>";
                  echo "<tr><td>Комментарий</td><td>$q[comment]</td></tr>";
                  echo "<tr><td>Статус заявки</td><td>$q[status]</td></tr>";*/
               /*  $q['rid'] . ' ' . $q['frommail'] . ' ' . $q['fio'] . ' ' . $q['phone'] . ' ' . $q['direction'];*/
                  echo "</table>";
                  echo "<br/>";
                  echo "<div class='app-popup-overlay'>";
                  echo "<div class='app-popup' id='app-popup'>";
                  echo "<h1>Данные о назначении </h1>";
                  echo "</div></div>";
           }
      }
      else{
          echo "Назначений нет";
      }
    ?>
</div>

<?php
//include_once 'schedule.php';
include_once 'admin_footer.php';
?>


