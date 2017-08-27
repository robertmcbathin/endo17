<?php
require_once '../functions.php';
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
function ApplyChanges(rid,fio,phone,frommail,desireddate,direction,comment)
{
        var input_fio = document.getElementByName('fio')
	params  = "rid=" + encodeURIComponent(rid) +"&fio" + encodeURIComponent(input_fio) + "&phone=" + encodeURIComponent(phone) +"&frommail=" + encodeURIComponent(frommail) + "&desireddate=" + 
                  encodeURIComponent(desireddate) + "&direction=" + encodeURIComponent(direction) + "&comment=" + encodeURIComponent(comment)
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
if(isset($_POST['apply_app_changes'])){
    $aid_i         = $_POST['aid_input'];
    $fio_i         = $_POST['app_fio_input'];
    $phone_i       = $_POST['app_modal_phone_input'];
    $frommail_i    = $_POST['mail_input'];
    $direction_i   = $_POST['app_modal_direction_input'];
    $doctor_i      = $_POST['app_modal_doctor_input'];
    $date_i        = $_POST['app_modal_date_input'];
    $begin_time_i  = $_POST['app_modal_begin_time_input'];
    $end_time_i    = $_POST['app_modal_end_time_input'];
    $cost_i        = $_POST['cost_input'];
    $comment_i     = $_POST['app_modal_comment_input'];
    $update_query = "UPDATE appointment SET fio='$fio_i', phone='$phone_i', `email`='$email_i', `direction`='$direction_i', `date`='$date_i',`begin_time`='$begin_time_input',`end_time`='$end_time_input', `comment`='$comment_i', `cost`='$cost_i' WHERE aid='$aid_i' ";
    $result = queryMysql($update_query);     
    if($result)
      {
        echo "Изменения сохранены";
      }
     else
      {
        echo "Сохранить изменения не удалось";
      }
}
/*Удаление*/
if(isset($_POST['delete'])){
    $rid_i         = $_POST['rid_input'];
    $fio_i         = $_POST['fio_input'];
    $phone_i       = $_POST['phone_input'];
    $email_i    = $_POST['email_input'];
    $direction_i   = $_POST['direction_input'];
    $desireddate_i = $_POST['desireddate_input'];
    $comment_i     = $_POST['comment_input'];
    $delete_query = "DELETE FROM request WHERE rid='$rid_i'";
    $result = queryMysql($delete_query);     
    if($result)
      {
        echo "Заявка удалена";
      }
     else
      {
        echo "Удалить заявку не удалось";
      }
}
$aid = $_POST['aid'];
$query  = "SELECT * FROM appointment WHERE aid='$aid'";
$result = queryMysql($query);
if (mysql_num_rows($result)){
  if ($result){
      $q = mysql_fetch_assoc($result);
      $aid         = $q['aid'];
      $fio         = $q['fio'];
      $phone       = $q['phone'];
      $email       = $q['email'];
      $direction   = $q['direction'];
      $doctor      = $q['doctor'];
      $date        = $q['date'];
      $begin_time  = $q['begin_time'];
      $end_time    = $q['end_time'];
      $comment     = $q['comment'];
      $cost        = $q['cost'];
      $from_rid    = $q['from_rid'];      
      $_POST['aid'] = $aid;
         echo "<form method='post' action='appointment_in_modal.php' id='AppModalForm'>";
         echo   "<div id='app-modal-left'>";
         echo     "<p>НОМЕР НАЗНАЧЕНИЯ: $aid</p>";
         echo     "<input type='hidden' name='aid_input' value='$aid'>";
         echo     "<p>СТАТУС:$q[status]</p>";
         echo   "</div>";
         echo   "<div id='app-modal-right'>";
         echo     "<div id='client-info'>";
         echo       "<div class='field'>";
         echo         "<label for='fio'>ФИО: </label><input type='text' value='$fio' size='40' id='fio' name='app_fio_input'>";
         echo       "</div>";
         echo       "<div class='field'>";
         echo         "<label for='phone'>Телефон: </label><input type='text' value='$phone' size='10' id='phone' name='phone_input'>";
         echo       "</div>";
         echo       "<div class='field'>";
         echo         "<label for='email'>Электронная почта: </label><input type='text' value='$email' size='50' id='email' name='email_input'>";
         echo       "</div>";
         echo       "<div class='field'>";
         echo         "<label for='direction'>Направление обследования: </label><input type='text' value='$direction' size='30' id='direction' name='direction_input'>";
         echo       "</div>";
         echo       "<div class='field'>";
         echo         "<label for='doctor'>Принимающий врач: </label><input type='text' value='$doctor' size='50' id='doctor' name='doctor_input'>";
         echo       "</div>";
         echo       "<div class='field'>";
         echo         "<label for='date'>Назначенная дата приёма: </label><input type='date' id='date' value='$date' name='date_input'>";
         echo       "</div>";
         echo       "<div class='field'>";
         echo         "<label for='begin_time'>Начало приёма </label><input type='time' id='begin_time' value='$begin_time' name='begin_time_input'>";
         echo       "</div>";
         echo       "<div class='field'>";
         echo         "<label for='end_time'>Окончание приёма: </label><input type='time' id='end_time' value='$end_time' name='end_time_input'>";
         echo       "</div>";
          echo       "<div class='field'>";
         echo         "<label for='cost'>Стоимость: </label><input type='text' id='cost' value='$cost' name='cost_input'>";
         echo       "</div>";
         echo       "<div class='field'>";
         echo         "<label for='comment'>Комментарий: </label><textarea id='comment' cols='50' name='comment_input'>$comment</textarea>";
         echo       "</div>";
         echo       "<input type='submit' name='apply_app_changes' value='Сохранить изменения' /> ";
         echo       "<input type='reset' name='reset' value='Отменить изменения'/> ";
         echo       "<input type='button' name='appoint' value='Назначить приём' onclick='ToggleAppointment()'/> ";
         echo       "<input type='submit' name='delete' value='Удалить заявку'/> ";
         echo     "</div>";
         echo   "</div>";
         echo "</form>";
         echo "<div id='ReqToApp'><p>Добавить назначение</p>";
         echo "<form id='SetAppointment'>";
         echo "<input type='hidden' value='$fio'>";
         echo "</form>";
         echo "</div>";
         echo "<div id='result'></div>";
  }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

