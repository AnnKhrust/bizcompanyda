<?php

// Файлы phpmailer

require 'phpmailer/PHPMailer.php';

require 'phpmailer/SMTP.php';

require 'phpmailer/Exception.php';



// Переменные, которые отправляет пользователь

$name = $_POST['name'];

$phone = $_POST['phone'];

$text = $_POST['text'];

$sphere = $_POST['sphere'];

$promo = $_POST['promo'];



// Формирование самого письма

$title = "Новая заявка на участие в Бизес Fuck-Up";

$body = '<h1>Посетитель сайта заполнил анкету</h1>';

	

	if(trim(!empty($_POST['name']))){

		$body.='<p><strong>Имя:</strong> '.$_POST['name'].'</p>';

	}

	

	if(trim(!empty($_POST['phone']))){

		$body.='<p><strong>Телефон:</strong> '.$_POST['phone'].'</p>';

	}

	if(trim(!empty($_POST['sphere']))){

		$body.='<p><strong>Сфера бизнеса:</strong> '.$_POST['sphere'].'</p>';

	}

	

	if(trim(!empty($_POST['message']))){

		$body.='<p><strong>Сообщение:</strong> '.$_POST['message'].'</p>';

	}

    if(trim(!empty($_POST['promo']))){

		$body.='<p><strong>Промокод:</strong> '.$_POST['promo'].'</p>';

	}



// Настройки PHPMailer

$mail = new PHPMailer\PHPMailer\PHPMailer();

try {

    $mail->isSMTP();   

    $mail->CharSet = "UTF-8";

    $mail->SMTPAuth   = true;

    $mail->SMTPDebug = 2;

    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};



    // Настройки вашей почты

    $mail->Host       = 'smtp.yandex.ru'; // SMTP сервера вашей почты

    $mail->Username   = 'biz.company-da'; // Логин на почте

    $mail->Password   = 'wimidhyhuqghxdgt'; // Пароль на почте

    $mail->SMTPSecure = 'ssl';

    $mail->Port       = 465;

    $mail->setFrom('biz.company-da@yandex.ru', 'Бизнес Fuck-Up'); // Адрес самой почты и имя отправителя



    // Получатель письма

    $mail->addAddress('alikberg89@gmail.com');  

    $mail->addAddress('inclubclubs@gmail.com'); 
    



    

// Отправка сообщения

$mail->isHTML(true);

$mail->Subject = $title;

$mail->Body = $body;    



// Проверяем отравленность сообщения

if ($mail->send()) {$result = "success";} 

else {$result = "error";}



} catch (Exception $e) {

    $result = "error";

    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";

}



// Отображение результата

echo json_encode(["result" => $result, "resultfile" => $rfile, "status" => $status]);