 <?php include_once 'header.php';?>
  <section id="immagine">
  <div class="row" style="max-width:1920px;">
    <div class="center">
      <div class="inrow">
	   <?php
             $alert       = $fio = $email = $phone = $direction = $datetime = $comment = $headers = '';	
	     $query       = "SELECT rid FROM request";
	     $request     = mysql_num_rows(queryMysql($query));
	     $nextrequest = ($request+1);
	     if(isset($_POST['fio']))
               {
                 /*Request content*/
		$fio       = $_POST['fio'];
		$phone     = $_POST['phone'];
		$email     = $_POST['email'];
		$datetime  = $_POST['datetime'];
		$direction = $_POST['direction'];
		$comment   = $_POST['comment'];
                /*End content*/
	        if ($fio == "" || $email == "" || $phone == "" || $direction == "")
                {
	           $alert = '<p><font color="red">Заполнены не все поля! Перепроверьте, пожалуйста! </font></p><br />';//Error
                   echo "<p>" . $alert . "</p>";
	        }
	        else
	          {
                   $date_of_receive = date("y.m.d H:i:s");
		   $to      = 'registry@endoscopy21.ru';
		   $subject = 'Заявка №' . $nextrequest . ' - ' . $fio . ' - ' . $direction;
		   $message = "<html><head></head><body><table><tr><td><strong>Клиент</strong></td><td>" . $fio . "</td></tr><td><strong>Телефон</strong></td><td>" . $phone . "</td></tr><tr><td><strong>E-mail</strong></td><td>" . $email . "</td></tr><tr><td><strong>Желаемые дата и время приёма</strong></td><td>" . $datetime . "</td></tr>
		   <tr><td><strong>Направление</strong></td><td>" . $direction . "</td></tr><tr><td><strong>Комментарий</strong></td><td>" . $comment . "</td></tr><tr></tr></table></body></html>";
		   $headers .= "Content-type: text/html; charset=utf-8\r\n";
                   if (mail($to, $subject, $message,$headers))
		     {
			$query = mysql_query("INSERT INTO request VALUES('','$to', '$email', '$fio','$phone','$date_of_receive', '$direction', '$desireddate', '$comment', 'new')");
			$alert = '<h2>Ваша заявка отправлена! Ждите подтверждения по электронной почте!</h2><br><br><br><br><br><br><br>';
                        //$alert .='';
			echo "<p><strong>" . $alert . "</strong></p>";
		     }
                   else
		     {
			$alert = '<p><font color="red">К сожалению, что-то пошло не так... Заявку отправить не удалось. Позвоните в регистратуру напрямую! Телефон: 21-77-66</font></p>';
		     }   
                   $to_client = $email;//Client e-mail address
                   $subject_to_client = 'Ваша заявка №' . $nextrequest . ' в эндоскопическом центре';
                   $message_to_client = "<html><head></head><body><td><strong>Здравствуйте,</strong>" . $fio . "! Вы оставили заявку в электронной регистратуре нашей поликлиники. В скором времени с Вами свяжутся по номеру " . $phone . " для уточнения деталей приёма. <p>С уважением, электронная регистратура ООО ''Лечебно-диагностическая поликлиника''</p><p>Это сообщение было сгенерировано автоматически, на него не нужно отвечать</p></body></html>";
                   $headers .= "From: Эндоскопический центр. Регистратура <no-reply@endoscopy21.ru>" . "\r\n" ;
                   mail($to_client, $subject_to_client, $message_to_client, $headers);
                   $headers = '';
	           }
               }
?>  
         <h2>ЗАПИШИТЕСЬ НА ПРИЁМ СЕЙЧАС!</h2>
		 <form method='post' action='registry' >
		   <p>Ваши фамилия, имя и отчество <strong>*</strong></p>
           <input class="pw" type="text" name='fio' size="50" maxlength='200' value="<?php echo $fio;?>"/>
		   <p>Ваш контактный телефон <strong>*</strong></p>
           <input class="pw" type="text" name='phone' size="20" value="<?php echo $phone;?>"/>
		   <p>Ваш адрес электронной почты (e-mail) <strong>*</strong></p>
		   <input class="pw" type="email" name='email' size="40" value="<?php echo $email;?>"/>
		   <p>Выберите направление обследования<strong>*</strong>(Если не получается выбрать из выпадающего списка, то введите ФГДС, Колоноскопия, Проктология, либо консультация гастроэнтеролога)</p>
		   <input list="direction" id="list" name='direction' size="30" type="text" value="<?php echo $direction;?>"/>
		   <datalist id="direction">
                         <option value="Эзофагогастродуоденоскопия (ФГДС)">
                         <option value="Колоноскопия (ФКС)">
			 <option value="Проктология">
			 <option value="Консультация гастроэнтеролога">
           </datalist>
		   <p>Вы можете указать желаемые дату и время приема (в формате ДД-ММ-ГГ ЧЧ:ММ-ЧЧ:ММ) Пример: <strong>01-10-13 16:00-18:00</strong></p>
		   <input class="pw" type="text" size="20" name='datetime' pattern="[0-3][0-9]-[0-1][0-9]-[1-9][0-9] [0-2][0-9]:[0-5][0-9]-[0-2][0-9]:[0-5][0-9]" value="<?php echo $datetime;?>"/>
		    <p>Также Вы можете добавить свой комментарий</p>
		   <textarea  class='pw' cols='100' rows='10' name='comment' spellcheck="true"><?php echo $comment;?></textarea>
           <input type="submit" class="button" id="button"  value="Отправить заявку"/>
        </form>
		<p>Обращаем Ваше внимание, что для избежания инцидентов Вам необходимо получить подтверждение от администратора (по электронной почте или телефону)</p>
	  </div>
    </div>
  </div>
  </section>
<?php include_once 'footer.php';?>
<!--/([0-2]\d|3[01])\.(0\d|1[012])\.(\d{4})/-->