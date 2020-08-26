<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$SureName = $_POST['user_SureName'];
$Name = $_POST['user_Name'];
$NameSure=$_['user_NameSure'];
$number = $_POST['phone_number_secondForm'];

$data = $_POST['user_day'].'.'.$_POST['user_month'].'.'.$_POST['user_year'];
$marka = $_POST['user_marka'];
$year= $_POST['year'];
$Price = $_POST['Price'];
$ter = $_POST['user_ter'];
switch($_POST['radio'])
    {
        case "2":
          $radio = 'нет';
            break;
        case "1":
          $radio = 'да';
            break;
        
          
    }

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
$mail->addAttachment($_FILES['Firstside']['tmp_name'], $_FILES['Firstside']['name']);  
$mail->addAttachment($_FILES['Secondside']['tmp_name'], $_FILES['Secondside']['name']); 
$mail->addAttachment($_FILES['photoNum3']['tmp_name'], $_FILES['photoNum3']['name']);   
  // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Каско';
$mail->Body    = '<br> Фамилия: '.$SureName.'<br>Имя: '.$Name.'<br> Отчество'.$NameSure. '<br> Номкр: '.$number.'<br> Автомобиль в залоге '.$radio.'<br> Марка и модель автомобиля'.$marka.'<br> Год выпуска автомобиля'.$year.'<br> Стоимость автомобиля'.$Price.''.$email;
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';
} else {
    header('location: thank-you.html');
}
?>


