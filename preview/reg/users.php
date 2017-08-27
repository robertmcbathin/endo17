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
?>
<!--
Display the requests
Show and Edit ef
-->
<aside id="navi">
    <nav>
        <a href="#requests">ЗАЯВКИ</a>
        <a href="#appointments">НАЗНАЧЕНИЯ</a>
        <a href="#graphic">ГРАФИК ВРАЧЕЙ</a>
        <a href="#reports">ОТЧЁТНОСТЬ</a>
    </nav>
</aside>
<div id='requests'>  
    <?php
      $requests     = "SELECT * FROM request";
      $result       = queryMysql($requests);
      $selected_rid = '';
      if (mysql_num_rows($result)){
         if ($result){
                  echo "<table>";         
                  echo "<tr><td>Номер</td><td>ФИО</td><td>Телефон</td><td>Электронная почта</td><td>Получено</td><td>Направление</td><td>Желаемая дата приёма</td><td>Комментарий</td><td>Статус</td></tr>";
                  while ($q = mysql_fetch_assoc($result)){
                  echo "<tr id='r$q[rid]' onclick='ToModal($q[rid])'><td id='popup-toggle'>$q[rid]</td><td>$q[fio]</td><td>$q[phone]</td><td>$q[frommail]</td><td>$q[date_of_receive]</td><td>$q[direction]</td><td>$q[desireddate]</td><td>$q[comment]</td><td>$q[status]</td></tr>";
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
<?php
include_once 'admin_footer.php';
?>


