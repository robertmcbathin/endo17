<?php
$title = "Запись на прием";
$description = "Эндоскопический центр ООО Лечебно-диагностическая поликлиника. Электронная регистратура. Запись на прием";
$keywords = "запись на прием, электронная регистратура, запись онлайн, записать на обследование";
include_once 'inc/header.php';
if(isset($_POST['fio']))
{
  /*VARIABLES INIT*/
  $directions = array("Фиброэзофагогастродуоденоскопия (ФГДС)",
                 "Колоноскопия (ФКС)",
                 "Проктология",
                 "Гастроэнтеролог",
                 "Невролог",
                 "Терапевт",
                 "Эндокринолог",
                 "УЗИ"
                );
  $alert = '';
  $tomail           = 'registry@endoscopy21.ru';
  $date_of_receive  = date('Y-m-d H:i:s');
  $status = 'new';

  $fio              = $_POST['fio'];
  $direction        = $_POST['direction'];
  $appointment_date = $_POST['appointment_date'];
  $appointment_time = $_POST['appointment_time'] . ":00";
  $phone            = $_POST['phone'];
  $frommail         = $_POST['email'];
  $comment          = $_POST['comment']; 
  /*--------------*/
  /*SCREENING VARIABLES*/
  $fio               = $mysqli->real_escape_string($fio); 
  $direction         = $mysqli->real_escape_string($direction);
  $appointment_date  = $mysqli->real_escape_string($appointment_date);
  $appointment_time  = $mysqli->real_escape_string($appointment_time);
  $phone             = $mysqli->real_escape_string($phone);
  $frommail          = $mysqli->real_escape_string($frommail);
  $comment           = $mysqli->real_escape_string($comment);
  /*-------------------*/
  /*CHECK DATA AGAIN*/
  if(!in_array($direction,$directions))
  {
    die("<div class=\"alert alert-danger\" role=\"alert\">Выберите направление обследования из списка</div>");
  }
  if ($fio == '' || $direction == '' || $appointment_date == '' || $appointment_time == '' || $phone == ''){
    die("<div class=\"alert alert-danger\" role=\"alert\">Заполнены не все поля. <a href=\"registry\">Попробуйте заново</a></div>");
  }
  else
  {
    /*EXECUTING THE QUERY*/
    $sql = "INSERT INTO  `request` VALUES('','$tomail','$frommail','$fio','$phone','$date_of_receive','$direction','$appointment_date','$appointment_time','$comment','new')";
    if(!$mysqli->query($sql))
    {
      die("<div class=\"alert alert-danger\" role=\"alert\">Что-то пошло не так. Пожалуйста, повторите попытку или свяжитесь с нами по телефону (8352) 21-77-66</div>");
    }
    else
    {
      /*GET LAST ID*/
      $last_rid = $mysqli->insert_id;
      /*-----------*/
      /*SEND EMAIL*/
       $subject = 'Заявка №' . $last_rid . ' - ' . $fio . ' - ' . $direction;
       $message = "<html><head></head><body>
       <table>
         <tr><td><strong>Клиент</strong></td><td>" . $fio . "</td></tr>
         <tr><td><strong>Телефон</strong></td><td>" . $phone . "</td></tr>
         <tr><td><strong>E-mail</strong></td><td>" . $frommail . "</td></tr>
         <tr><td><strong>Желаемые дата и время приёма</strong></td><td>" . $appointment_date . "</td></tr>
         <tr><td><strong>Время начала приёма</strong></td><td>" . $appointment_time . "</td></tr>
         <tr><td><strong>Направление</strong></td><td>" . $direction . "</td></tr>
         <tr><td><strong>Комментарий</strong></td><td>" . $comment . "</td></tr>
         <tr></tr>
       </table></body></html>";
       $headers .= "Content-type: text/html; charset=utf-8\r\n";
       if (mail($tomail, $subject, $message,$headers))
       {
         $alert = "<div class=\"center\"><div class=\"alert alert-success\" role=\"alert\">Ваша заявка отправлена! Ждите подтверждения по электронной почте и от администратора</div></div>";
         /*SEND EMAIL TO CLIENT*/
         $to_client = $frommail;
         $subject_to_client = 'Ваша заявка №' . $last_rid . ' в эндоскопическом центре';
         $message_to_client = "<html><head></head><body><strong>Здравствуйте,</strong>" . $fio . "! Вы оставили заявку в электронной регистратуре нашей поликлиники. В скором времени с Вами свяжутся по номеру " . $phone . " для уточнения деталей приёма. <p>С уважением, электронная регистратура ООО ''Лечебно-диагностическая поликлиника''</p><p>Это сообщение было сгенерировано автоматически, на него не нужно отвечать</p></body></html>";
         $headers .= "From: Эндоскопический центр. Регистратура <no-reply@endoscopy21.ru>" . "\r\n" ;
         mail($to_client, $subject_to_client, $message_to_client, $headers);
         $headers = '';
         /*-------------------*/
         die($alert);
       }
      /*----------*/
    }
    /*-------EXECUTING THE QUERY------------*/
  }
  /*-------CHECK DATA AGAIN---------*/
}
?>
    <section>
        <div class="container">
          <div class="center">
            <h2>Запишитесь на прием!</h2>
          </div>
          <div class="input-group">
            <form method='post' action='registry' >
              <label for="fio">
                Фамилия, имя и отчество*
                <input class="form-control" name='fio' type="text" maxlength="80" value="<?echo $fio;?>" required/></label>
              <br>        
              <label for="direction">
                Какое направление обследования Вы хотите пройти?*
                <input list="direction" name="direction" class="form-control" type="text" maxlength="80" value="<?echo $direction;?>" required/>
                <datalist id="direction">
                  <option value="Фиброэзофагогастродуоденоскопия (ФГДС)"></option>
                  <option value="Колоноскопия (ФКС)"></option>
                  <option value="Проктология"></option>
                  <option value="Гастроэнтеролог"></option>
                  <option value="Невролог"></option>
                  <option value="Терапевт"></option>
                  <option value="Эндокринолог"></option>
                  <option value="УЗИ"></option>
                </datalist>
              </label>
              <br>        
              <label for="appointment_date">
                Желаемая дата приема*
                <input class="form-control" id="appointment_date" name="appointment_date" type="date" maxlength="15" value="<?echo $appointment_date;?>" required/></label>
              <br>        
              <label for="appointment_time">
                Желаемое время приема*
                <input class="form-control" name="appointment_time" type="time" maxlength="10" value="<?echo $appointment_time;?>" required/></label>
              <br>        
              <label for="phone">
                Ваш контактный номер телефона*
                <input class="form-control" name="phone" type="text" maxlength="20" value="<?echo $phone;?>" required/></label>
              <br>        
              <label for="email">
                Ваш адрес электронной почты (при наличии)
                <input class="form-control" name="email" type="text" maxlength="40" value="<?echo $email;?>"/></label>
              <br>        
              <label for="comment">
                Дополнительная информация
                <textarea class="form-control" name="comment" cols="30" rows="5"><? echo $comment;?></textarea>
              </label>
              <br>
              <input type="submit" class="btn btn-primary registry-button" value="Отправить заявку"/>        
            </form>
          </div>
          <!-- /input-group --> </div>
        <!--/.container-->        
    </section><!--/#feature-->
    <script>
      $('#appointment_date').blur(function(){
        console.log($('#appointment_date').val());
        var now = new Date(),
            nowDay = now.getDate(),
            nowMonth = now.getMonth(),
            nowYear = now.getFullYear(),
            currentDate = '';
        currentDate = nowYear + '-' + nowMonth + '-' + nowDay;
        console.log(currentDate + ' ' + now);
      });
    </script>
<?php
include_once 'inc/footer.php';
?>