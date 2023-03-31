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
<h2> Registration Form </h2>
<form name="form" method="post" action="#">
    Name<br>
    <input type=text name="fname"><br>
    Family <br>
    <input type=text name="lname"><br>
    E-mail <br>
    <input type=text name="email"><br>
    <p> Choose a course:<br>
        <input type=checkbox name='kurs[]' value='PHP'>PHP<br>
        <input type=checkbox name='kurs[]' value='Lisp'>Lisp<br>
        <input type=checkbox name='kurs[]' value='Perl'>Perl<br>
        <input type=checkbox name='kurs[]' value='Unix'>Unix<br>
    <P> Additional Information for you? <br/>
        <textarea name="comment" cols=40 rows=10></textarea><br>
        <input type=checkbox name='confirm' value='confirm'>Confirm the receiving of the information<br>
        <input type=submit name="submit" value="Submit"> <br>
        <input type=reset name="reset" value="Reset">
</form>
<?php
if (isset($_POST['submit'])) {
    if (empty($_POST['confirm'])) {
        echo "Please check the confirmation checkbox to submit!";
    } else {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $kurses = $_POST['kurs'];

        echo "Hello, $fname $lname! <br>";
        echo "Your choice is " . implode(" ", $kurses);
    }

}
?>
</body>
</html>
