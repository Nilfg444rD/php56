<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';

    // Проверяем, что все поля заполнены
    if (!$login || !$password) {
        // Вывести сообщение об ошибке
        exit('Пожалуйста, заполните все поля.');
    }

    // Зашифровываем пароль
    $passwordHash = md5($password);

    // Сохраняем данные пользователя
    $userData = $login . ':' . $passwordHash . "\n";
    file_put_contents('users.txt', $userData, FILE_APPEND);

    // Отправляем HTTP-код 201
    http_response_code(201);
    exit('Регистрация прошла успешно.');
}
?>
