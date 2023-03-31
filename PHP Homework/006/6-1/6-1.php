<?php
$file_path = "data.txt";

// Open the file for writing, or create it if it doesn't exist
$file = fopen($file_path, "a+") or die("Unable to open file!");

// Write the first line to the file
$txt1 = "Дисциплина Web приложения се изучава през втория семестър на втори курс.\nТази дисциплина се изучава от студенти, които са специалност СИТ.\n";
fwrite($file, $txt1);

// Write the second line to the file
$txt2 = "Студентите редовно си пишат домашните.\n";
fwrite($file, $txt2);

// Close the file
fclose($file);

// Read the content of the file
$content = file_get_contents($file_path);

// Output the content and file size
echo "Съдържание на файл data.txt с размер: " . filesize($file_path) . " байта <br>";
echo $content;
?>