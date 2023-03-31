<table width="400" border="0" align="center" cellpadding="3" cellspacing="0">
    <tr>
        <td><strong>View Guestbook | <a href="index.php">Sign Guestbook</a> </strong></td>
    </tr>
</table>
<br>
<?php
include './db/config.php';
$sql = "SELECT * FROM guestbook";
$result = mysqli_query($dbConn, $sql);
while ($row = mysqli_fetch_assoc($result)) :
?>
    <table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
        <tr>
            <td>
                <table width="400" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                    <?php foreach ($row as $key => $value) : ?>
                        <tr>
                            <td><?= ucfirst($key) ?></td>
                            <td>:</td>
                            <td><?= $value ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </td>
        </tr>
    </table>
    <BR>
<?php endwhile; ?>