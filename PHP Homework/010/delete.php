<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border="7">
        <thead>
            <tr>
                <th>Номер</th>
                <th>Заглавие</th>
                <th>Автор</th>
                <th>Издателство</th>
                <th>Година</th>
            </tr>
        </thead>

        <?php
        include '../dbFiles/config.php';
        $view_orders_query = "SELECT * FROM book";
        $run = mysqli_query($dbConn, $view_orders_query);

        while ($row = mysqli_fetch_array($run)) {
            $book_id = $row[0];
            $book_title = $row[1];
            $book_author = $row[2];
            $book_publisher = $row[3];
            $book_year = $row[4];
        ?>
            <tr>
                <td><?php echo $book_id; ?></td>
                <td><?php echo $book_title; ?></td>
                <td><?php echo $book_author; ?></td>
                <td><?php echo $book_publisher; ?></td>
                <td><?php echo $book_year; ?></td>
            </tr>
        <?php } ?>

        <tr>
            <th><a href="./delete-1.php">Изтриване</a></th>
        </tr>
    </table>
</body>
</html>
