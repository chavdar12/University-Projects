<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'deliveryinfo';
$tables = '*';

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Грешка: " . $conn->connect_error);
}

if ($tables == '*') {
    $tables = array();
    $sql = "SHOW TABLES";
    $query = $conn->query($sql);
    while ($row = $query->fetch_row()) {
        $tables[] = $row[0];
    }
} else {
    $tables = is_array($tables) ? $tables : explode(',', $tables);
}

$outsql = '';
foreach ($tables as $table) {

    $sql = "SHOW CREATE TABLE $table";
    $query = $conn->query($sql);
    $row = $query->fetch_row();

    $outsql .= "\n\n" . $row[1] . ";\n\n";

    $sql = "SELECT * FROM $table";
    $query = $conn->query($sql);

    $columnCount = $query->field_count;

    for ($i = 0; $i < $columnCount; $i++) {
        while ($row = $query->fetch_row()) {
            $outsql .= "INSERT INTO $table VALUES(";
            for ($j = 0; $j < $columnCount; $j++) {
                $row[$j] = $row[$j];

                if (isset($row[$j])) {
                    $outsql .= '"' . $row[$j] . '"';
                } else {
                    $outsql .= '""';
                }
                if ($j < ($columnCount - 1)) {
                    $outsql .= ',';
                }
            }
            $outsql .= ");\n";
        }
    }

    $outsql .= "\n";
}

$backup_file_name = $dbname . '_backup.sql';
$fileHandler = fopen($backup_file_name, 'w');
fwrite($fileHandler, $outsql);
fclose($fileHandler);
echo "Backup created in the same directory!";
?>