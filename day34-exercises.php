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
<div>
    <p>Exercise 1:</p>
    <form action="day34-exercises.php" method ="POST">
        Firstname: <input type="text"  name="fname" />
        Lastname: <input type ="text" name="lname" />
        <input  type="submit" name="submit"  />
    </form>
    <?php
    if( isset($_POST['submit'])) {
        if( $_POST['fname'] && $_POST['lname'] ) {
            echo "Welcome ". $_POST[ 'fname']. ' ' . $_POST[ 'lname']."<br />";
        } elseif (!$_POST['fname']) {
            echo "Firstname is missing! Please input both firstname and lastname.";
        } elseif (!$_POST['lname']) {
            echo "Lastname is missing! Please input both firstname and lastname.";
        }
    }
    ?>
</div>

</body>
</html>
