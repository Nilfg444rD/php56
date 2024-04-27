<?php
// Создание и запись в файл
$data = "1. William Smith, 1990, 2344455666677\n";
$data .= "2. John Doe, 1988, 4445556666787\n";
$data .= "3. Michael Brown, 1991, 7748956996777\n";
$data .= "4. David Johnson, 1987, 5556667779999\n";
$data .= "5. Robert Jones, 1992, 99933456678888\n";
file_put_contents("file.txt", $data);

// Добавление данных в файл
$additionalData = "6. Alice Cooper, 1993, 1234567890123\n";
$additionalData .= "7. Charlie Chaplin, 1994, 9876543210987\n";
$additionalData .= "8. Marilyn Monroe, 1995, 1029384756101\n";
file_put_contents("file.txt", $additionalData, FILE_APPEND);

// Чтение и вывод данных из файла
$fileContents = file_get_contents("file.txt");
?>
<div>Данные из файла:</div>
<?php
echo nl2br($fileContents);
?>
