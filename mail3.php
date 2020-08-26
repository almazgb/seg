<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$SureName = $_POST['user_SureName'];
$Name = $_POST['user_Name'];
$number = $_POST['user_number'];
$country = $_POST['countryArrive'];
$Cel= $_POST['celPoezdki'];
$sports= $_POST['sports'];
$gender= $_POST['gender'];
$age= $_POST['user_age'];
$summ = $_POST['summ'];


//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.yandex.com';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'almazgb15@yandex.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'Almaz160495'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('almazgb15@yandex.ru'); // от кого будет уходить письмо?
$mail->addAddress('centrs12@yandex.ru');     // Кому будет уходить письмо 
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment($_FILES['upload']['tmp_name'], $_FILES['upload']['name']);  
$mail->addAttachment($_FILES['upload1']['tmp_name'], $_FILES['upload1']['name']);  
  // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Туризм';
$mail->Body    = '<br> Фамилия: '.$SureName.'<br>Имя: '.$Name.'<br> Отчество'.$NameSure. '<br> Номкр: '.$number.'<br> Страна поездки'.$country.'<br> Цель поездки '.$Cel.'<br> Наличие спорта '.$sports.'<br> Пол '.$gender.'<br> Возраст'.$age.'<br> Сумма' . $summ .''.$email;
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';
} else {
    header('location: thank-you.html');
}
?>


