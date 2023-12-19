<?php
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Отримання даних з форми
$name = $_POST['name'];
$deviceType = $_POST['deviceType'];
$model = $_POST['model'];
$phone = $_POST['phone'];

// Формування самого листа
$title = "Новий запит на ремонт";
$body = "
<h2>Новий запит на ремонт</h2>
<b>Ім'я:</b> $name<br>
<b>Тип пристрою:</b> $deviceType<br>
<b>Модель:</b> $model<br>
<b>Телефон:</b> $phone<br>
";

// Налаштування PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth = true;

    // Налаштування вашої пошти
    $mail->Host = 'smtp.ukr.net'; // SMTP сервер вашої пошти
    $mail->Username = 'ros_kichuk@ukr.net'; // Логін на пошті
    $mail->Password = 'yFs1TF9IcF897CtW'; // Пароль на пошті
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('ros_kichuk@ukr.net', 'Рос'); // Адреса вашої пошти і ім'я відправника

    // Отримувач листа
    $mail->addAddress('sashakushnir4991@gmail.com');
    // $mail->addAddress(''); // Ще один, якщо потрібно

    // Відправлення повідомлення
    $mail->isHTML(true);
    $mail->Subject = $title;
    $mail->Body = $body;    

    // Перевірка відправлення повідомлення
    if ($mail->send()) {
        $result = "success";
    } else {
        $result = "error";
    }
} catch (Exception $e) {
    $result = "error";
    $status = "Повідомлення не було відправлено. Причина помилки: {$mail->ErrorInfo}";
}

// Виведення результату
echo json_encode(["result" => $result, "status" => $status]);
?>
