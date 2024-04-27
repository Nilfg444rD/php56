<?php
if (!isset($_REQUEST['submit'])) { ?>
<form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="post">
<div>
<label>Имя: <input name="user_name" type="text" size="30"></label>
</div>
<div>
<label>Мнение:
<textarea name="opinion" cols="40" rows="4" placeholder="Оставьте ваше мнение..."></textarea>
</label>
</div>
<div>
<label>Возраст: <input name="user_age" type="number" size="3"></label>
</div>
<div>
<label>Email: <input name="user_email" type="email" size="30"></label>
</div>
<div>
<input type="reset" value="Очистить"/>
<input type="submit" value="Отправить" name="submit"/>
</div>
</form>
<?php } else {
    // Сбор данных из формы
    $feedbackData = [
        'Name' => $_POST['user_name'] ?? "Не указано",
        'Opinion' => $_POST['opinion'] ?? "Без мнения",
        'Age' => $_POST['user_age'] ?? "Не указано",
        'Email' => $_POST['user_email'] ?? "Не указано"
    ];
    // Открытие файла для записи
    $outputFile = fopen('feedback_log.txt', 'a+') or die("Ошибка доступа к файлу!");
    foreach ($feedbackData as $info => $detail) {
        fwrite($outputFile, ucfirst($info) . ": " . htmlspecialchars($detail, ENT_QUOTES) . "\n");
    }
    fwrite($outputFile, "-------------------\n"); // Линия разделения для удобства просмотра
    fclose($outputFile);

    // Показываем записанные данные
    echo 'Спасибо за ваше мнение! Вот текущие отзывы: <br />';
    $outputFile = fopen("feedback_log.txt", "r") or die("Ошибка доступа к файлу!");
    while (!feof($outputFile)) {
        echo fgets($outputFile) . "<br />";
    }
    fclose($outputFile);
}
?>
