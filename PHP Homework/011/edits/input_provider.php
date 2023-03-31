<?php
include '../dbFiles/config.php';
$query = "SELECT * FROM towns";
$result = mysqli_query($dbConn, $query);

$options = "";
while ($row2 = mysqli_fetch_array($result)) {
    $options = $options . "<option>$row2[1]</option>";
}
?>
<html>
<head>
    <title>20621620</title>
</head>
<body>
<h2> Добавяне на доставчик </h2>
<form method="post">
    <label for="title">Фирма: </label><br>
    <input type="text" id="firm" name="firm"><br>
    <label for="title">Булстат: </label><br>
    <input type="text" id="bul" name="bul"><br><br>
    <label for="title">Населено място: </label>
    <select id="town" name="town">
        <?php echo $options; ?>
    </select><br>
    <label for="title">Телефон: </label><br>
    <input type="text" id="tel" name="tel"><br>
    <label for="title">Година на регистрация: </label><br>
    <input type="text" id="year" name="year"><br>
    <label for="title">Контакт: </label><br>
    <input type="text" id="contact" name="contact"><br>
    <input type="submit" name="submit" value="Въведи"/><br>
</form>
<table border="7">
    <thead>
    <tr>
        <th>Доставчик</th>
        <th>Булстат</th>
        <th>Адрес</th>
        <th>Телефон</th>
        <th>Година на регистрация</th>
        <th>Лице за контакти</th>
    </tr>
    </thead>
    <?php


    if (isset($_POST['submit'])) {
        $firm = $_POST['firm'];
        $bul = $_POST['bul'];
        $town = $_POST['town'];
        $tel = $_POST['tel'];
        $year = $_POST['year'];
        $contact = $_POST['contact'];

        if (!empty($firm) && !empty($bul) && !empty($town) && !empty($tel) && !empty($year) && !empty($contact)) {
            $sql = "INSERT INTO companyinfo (companyname,companynum,townname,companytel,companyyear,companycontact) VALUES ('$firm','$bul','$town','$tel','$year','$contact')";
            $result = mysqli_query($dbConn, $sql);
            if (!$result) {
                die('<br> Грешка');
            } else {
                echo "<br> Добавен запис";
            }
        } else {
            echo "<br> без празни полета";
        }
    }
    $view_query = "select * from companyinfo";
    $run = mysqli_query($dbConn, $view_query);

    while ($row = mysqli_fetch_array($run)) {
        $firm = $row[1];
        $bul = $row[2];
        $town = $row[3];
        $tel = $row[4];
        $year = $row[5];
        $contact = $row[6];

        ?>

        <tr>
            <td><?php echo $firm; ?></td>
            <td><?php echo $bul; ?></td>
            <td><?php echo $town; ?></td>
            <td><?php echo $tel; ?></td>
            <td><?php echo $year; ?></td>
            <td><?php echo $contact; ?></td>
        </tr>

    <?php }
    ?>
</body>
</html>