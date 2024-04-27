<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';

    // Проверяем, что все поля заполнены
    if (!$login || !$password) {
        // Вывести сообщение об ошибке
        exit('Пожалуйста, заполните все поля.');
    }

    // Проверяем, существует ли пользователь
    $users = file('users.txt');
    $passwordHash = md5($password);
    foreach ($users as $user) {
        list($userLogin, $userPassword) = explode(':', trim($user));
        if ($userLogin == $login && $userPassword == $passwordHash) {
            // Перенаправляем на страницу с изображениями
            header('Location: images.php');
            exit();
        }
    }

    // Если пользователь не найден
    exit('Неверный логин или пароль.');
}
?>
