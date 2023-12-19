<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Очищення та перевірка даних
    $deviceType = strip_tags(trim($_POST["deviceType"]));
    $model = strip_tags(trim($_POST["model"]));
    $name = strip_tags(trim($_POST["name"]));
    $phone = strip_tags(trim($_POST["phone"]));

    // Перевірка, що поля не порожні
    if (empty($deviceType) || empty($model) || empty($name) || empty($phone)) {
        echo "Усі поля повинні бути заповнені!";
        exit;
    }

    // Ваша електронна адреса
    $recipient = "sashakushnir4991@gmail.com";

    // Тема листа
    $subject = "Новий запит на ремонт від $name";

    // Вміст листа
    $email_content = "Тип пристрою: $deviceType\n";
    $email_content .= "Модель: $model\n";
    $email_content .= "Ім'я: $name\n";
    $email_content .= "Телефон: $phone\n";

    // Заголовки листа
    $email_headers = "From: $name <$recipient>";

    // Відправлення листа
    if (mail($recipient, $subject, $email_content, $email_headers)) {
        echo "Дякуємо! Ваш запит було надіслано.";
    } else {
        echo "На жаль, не вдалося відправити запит.";
    }
} else {
    // Не POST-запит
    echo "Щось пішло не так.";
}
?>