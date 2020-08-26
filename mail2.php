<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';
$NameSure = $_POST['user_SureName'];
$SureName = $_POST['user_SureName'];
$Name = $_POST['user_Name'];
$bank = $_POST['bank'];
$summOst = $_POST['summOst'];
$number = $_POST['phone_number'];
$whatDoYou = $_POST['whatDoYou'];
$firstOptionGender = $_POST['firstOptionGender'];
$professionFirstOption = $_POST['professionFirstOption'];
$agFirstOption = $_POST['agFirstOption'];
$ageOfPostroyka = $_POST['ageOfPostroyka'];
$nalichie = $_POST['nalichie'];
$ageHouse = $_POST['ageHouse'];
$ageOfHouse = $_POST['ageOfHouse'];
//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.yandex.com';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'almazgb15@yandex.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'Almaz160495'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

if($whatDoYou=='Жизнь и здоровье'){
  $otpravca = '<br> Фамилия: '.$SureName.'<br>Имя: '.$Name.'<br> Отчество'.$NameSure.  '<br> Номкр: '.$number.'<br> Банк Кредитор'.$bank.'<br> Сумма остатка  '.$summOst.'<br> Что нужно страховать :жизнь и здоровье  ' .'<br>Пол : '.$firstOptionGender.'<br>Возраст'.$agFirstOption.'<br> Профессия '.$professionFirstOption.''.$email;
}
else if($whatDoYou =='Квартира'){
  $otpravca     = '<br> Фамилия: '.$SureName.'<br>Имя: '.$Name.'<br> Отчество'.$NameSure.  '<br> Номкр: '.$number.'<br> Банк Кредитор'.$bank.'<br> Сумма остатка  '.$summOst.'<br> Что нужно страховать : Квартира ' .'<br> Год постройки : '.$ageOfPostroyka.'<br>Дерревяные перекрытия '.$nalichie.''.$email;

}
else if($whatDoYou=='Дом'){
  $otpravca    = '<br> Фамилия: '.$SureName.'<br>Имя: '.$Name.'<br> Отчество'.$NameSure.  '<br> Номкр: '.$number.'<br> Банк Кредитор'.$bank.'<br> Сумма остатка  '.$summOst.'<br> Что нужно страховать : ' .$whatDoYou .'<br>Год постройки : '.$ageHouse.'<br>Материал стен и перекрытий '.$ageOfHouse.''.$email;

}
switch($_POST['radio'])
    {
        case "2":
          $otpravca = '<br> Фамилия: '.$SureName.'<br>Имя: '.$Name.'<br> Отчество'.$NameSure.  '<br> Номкр: '.$number.'<br> Банк Кредитор'.$bank.'<br> Сумма остатка  '.$summOst.'<br> Что нужно страховать :жизнь и здоровье  ' .'<br>Пол : '.$firstOptionGender.'<br>Возраст'.$agFirstOption.'<br> Профессия '.$professionFirstOption.''.$email;
          
            break;
        case "1":
          $radio = 'да';
            break;
        
          
    }

$mail->setFrom('almazgb15@yandex.ru'); // от кого будет уходить письмо?
$mail->addAddress('centrs12@yandex.ru');     // Кому будет уходить письмо 
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
 
  // Optional name

$mail->isHTML(true);                                  // Set email format to HTML


$mail->Subject = 'Недвижимость';


$mail->Body    = $otpravca;


$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';
} else {
    header('location: thank-you.html');
}
?>


