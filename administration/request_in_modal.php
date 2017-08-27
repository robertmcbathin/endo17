<?php
require_once 'functions.php';
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

/*if(isset($_POST['fio'])){
    $input_fio = $_POST['input_fio'];
    $update_query = "UPDATE `request` SET `fio`='$input_fio', `phone`='$phone', `frommail`='$frommail', `direction`='$direction', `desireddate`='$desireddate', `comment`='$comment' WHERE `rid`='$rid' ";
    $result = queryMysql($update_query);
    if($result){
    echo "Изменения сохранены";
    }
    else{
         echo "Сохранить изменения не удалось";   
    }
    }*/
if(isset($_POST['apply'])){
    $rid_i         = $_POST['rid_input'];
    $fio_i         = $_POST['fio_input'];
    $phone_i       = $_POST['phone_input'];
    $frommail_i    = $_POST['frommail_input'];
    $direction_i   = $_POST['direction_input'];
    $desireddate_i = $_POST['desireddate_input'];
    $comment_i     = $_POST['comment_input'];
    $update_query = "UPDATE request SET fio='$fio_i', phone='$phone_i', `frommail`='$frommail_i', `direction`='$direction_i', `desireddate`='$desireddate_i', `comment`='$comment_i' WHERE rid='$rid_i' ";
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
    $frommail_i    = $_POST['frommail_input'];
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

$rid = $_POST['rid'];
$query  = "SELECT * FROM request WHERE rid='$rid'";
$result = queryMysql($query);
if (mysql_num_rows($result)){
  if ($result){
      $q = mysql_fetch_assoc($result);
      $rid         = $q['rid'];
      $fio         = $q['fio'];
      $phone       = $q['phone'];
      $frommail    = $q['frommail'];
      $direction   = $q['direction'];
      $desireddate = $q['desireddate'];
      $begin_time  = $q['begin_time'];
      $end_time    = $q['end_time'];
      $comment     = $q['comment'];
      $_POST['rid'] = $rid;
         echo "<form method='post' action='request_in_modal.php' id='ModalForm'>";
         echo   "<div id='request-modal-left'>";
         echo     "<p>НОМЕР ЗАЯВКИ: $rid</p>";
         echo     "<input type='hidden' name='rid_input' value='$rid'>";
         echo     "<p>ПОЛУЧЕНО:$q[date_of_receive]</p>";
         echo     "<p>СТАТУС:$q[status]</p>";
         echo   "</div>";
         echo   "<div id='request-modal-right'>";
         echo     "<div id='client-info'>";
         echo       "<div class='field'>";
         echo         "<label for='fio'>ФИО: </label><input type='text' value='$fio' size='40' id='fio' name='fio_input'>";
         echo       "</div>";
         echo       "<div class='field'>";
         echo         "<label for='phone'>Телефон: </label><input type='text' value='$phone' size='10' id='phone' name='phone_input'>";
         echo       "</div>";
         echo       "<div class='field'>";
         echo         "<label for='frommail'>Электронная почта: </label><input type='text' value='$frommail' size='50' id='frommail' name='frommail_input'>";
         echo       "</div>";
         echo       "<div class='field'>";
         echo         "<label for='direction'>Направление обследования: </label><input type='text' value='$direction' size='30' id='direction' name='direction_input'>";
         echo       "</div>";
         echo       "<div class='field'>";
         echo         "<label for='desireddate'>Желаемая дата приёма: </label><input type='date' id='desireddate' value='$desireddate' name='desireddate_input'>";
         echo       "</div>";
         echo       "<div class='field'>";
         echo         "<label for='begin_time'>Начало приёма </label><input type='time' id='begin_time' value='$begin_time' name='begin_time_input'>";
         echo       "</div>";
         echo       "<div class='field'>";
         echo         "<label for='end_time'>Окончание приёма: </label><input type='time' id='end_time' value='$end_time' name='end_time_input'>";
         echo       "</div>";
         echo       "<div class='field'>";
         echo         "<label for='comment'>Комментарий: </label><textarea id='comment' cols='50' name='comment_input'>$comment</textarea>";
         echo       "</div>";
         echo       "<input type='submit' name='apply' value='Сохранить изменения' /> ";
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

