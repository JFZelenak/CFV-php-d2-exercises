<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>php day2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .myCard {
            width: 250px;
            height: 250px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px solid black;
            box-shadow: 0 0 7px grey;
            margin: 0 5px;
        }
        .myRed {
            color: red;
        }
        .myGreen {
            color: green;
        }
        .bgImgVeryCold, .bgImgCold, .bgImgPleasant, .bgImgWarm, .bgImgHot {
            background-size: cover;
            color: white;
            text-shadow: 0 0 7px black;
            font-size: 22px;
            font-weight: bold;
        }
        .bgImgVeryCold {
            background-image: url('https://cdn.pixabay.com/photo/2016/05/02/12/21/winter-1367153_1280.jpg');
        }
        .bgImgCold {
            background-image: url('https://cdn.pixabay.com/photo/2020/01/03/21/32/field-4739176_1280.jpg');
        }
        .bgImgPleasant {
            background-image: url('https://cdn.pixabay.com/photo/2020/06/05/16/18/meadow-5263664_1280.jpg');
        }
        .bgImgWarm {
            background-image: url('https://cdn.pixabay.com/photo/2017/06/17/16/06/sea-2412596_1280.jpg');
        }
        .bgImgHot {
            background-image: url('https://cdn.pixabay.com/photo/2016/11/19/17/24/desert-1840453_1280.jpg');
        }

    </style>
</head>
<body>
    <div class="container">
        <h2>php day 2 - exercises</h2>

        <div class="border p-3">
            <p>Exercise 1: Welcome Firstname Lastname</p>
            <form action="day34-exercises.php" method ="POST">
                Firstname: <input type="text"  name="fname" />
                Lastname: <input type ="text" name="lname" />
                <input  type="submit" name="submit1"  />
            </form>
            <?php
            if( isset($_POST['submit1'])) {
                if( $_POST['fname'] && $_POST['lname'] ) {
                    echo "Welcome ". $_POST[ 'fname']. ' ' . $_POST[ 'lname']."<br />";
                } elseif (!$_POST['fname'] && !$_POST['lname']) {
                    echo "Firstname and lastname is missing! Please input both firstname and lastname.";
                } elseif (!$_POST['fname']) {
                    echo "Firstname is missing! Please input both firstname and lastname.";
                } elseif (!$_POST['lname']) {
                    echo "Lastname is missing! Please input both firstname and lastname.";
                }
            }
            ?>
        </div>

        <div class="border p-3">
            <p>Exercise 2: Divide Number1 by Number2</p>
            <form action="day34-exercises.php" method ="POST">
                First number: <input type="number" name="num1" />
                Second number: <input type="number" name="num2" />
                <input  type="submit" name="submit2"  />
            </form>
            <?php
            if( isset($_POST['submit2'])) {
                echo divide($_POST['num1'],$_POST['num2']);
            }
            function divide($num1,$num2){
                return $num1 / $num2;
            }

            // echo divide(6,3);
            ?>
        </div>

        <div class="border p-3">
            <p>Exercise 3: Get Sum and Avg from three grades</p>
            <form action="day34-exercises.php" method ="POST">
                Maths grade: <input type="number" name="mathsGrade" />
                Physics grade: <input type="number" name="physicsGrade" />
                English grade: <input type="number" name="englishGrade" />
                <input  type="submit" name="submit3"  />
            </form>
            <?php
            if( isset($_POST['submit3'])) {
                if(!$_POST['mathsGrade'] || !$_POST['physicsGrade'] || !$_POST['englishGrade']) {
                    echo 'input missing!';
                } else {
                    echo 'Sum: '.sum($_POST['mathsGrade'],$_POST['physicsGrade'],$_POST['englishGrade']).'<br>';
                    echo 'Avg: '.avg();
                }
            }
            function sum($mathsGrade,$physicsGrade,$englishGrade){
                $GLOBALS['sum1']= $mathsGrade+$physicsGrade+$englishGrade;
                return $GLOBALS['sum1'];
            }
            function avg(){
                return $GLOBALS['sum1'] / 3;
            }
            ?>
        </div>

        <div class="border p-3">
            <p>Exercise 4: Get area and volume of three values</p>
            <form action="day34-exercises.php" method ="POST">
                width: <input type="number" name="width" />
                length: <input type="number" name="length" />
                height: <input type="number" name="height" />
                <input  type="submit" name="submit4"  />
            </form>
            <?php
            if( isset($_POST['submit4'])) {
                if(!$_POST['width'] || !$_POST['length'] || !$_POST['height']) {
                    echo 'input missing!';
                } else {
                    echo 'The area of the box is: '.area($_POST['width'],$_POST['length']).'m2'.'<br>';
                    echo 'The volume of the box is: '.volume($_POST['height']).'m3';
                }
            }
            function area($width,$length){
                $GLOBALS['area1'] = $width * $length;
                return $GLOBALS['area1'];
            }
            function volume($height){
                return $GLOBALS['area1'] * $height;
            }
            ?>
        </div>

        <div class="border p-3">
            <p>Exercise 5: Minutes to hours and minutes</p>
            <form action="day34-exercises.php" method ="POST">
                minutes: <input type="number" name="minutes" />
                <input  type="submit" name="submit5"  />
            </form>
            <?php
            if( isset($_POST['submit5'])) {
                if(!$_POST['minutes']) {
                    echo 'input missing!';
                } else {
                    echo $_POST['minutes'].' minutes = '.minutesToHoursAndMinutes($_POST['minutes']);
                }
            }
            function minutesToHoursAndMinutes($minutes){
                $hours = round($minutes / 60);
                $restMinutes = $minutes % 60;
                return $hours.'hour(s) and '.$restMinutes.'minute(s)';
            }
            ?>
        </div>

        <div class="border p-3">
            <p>Exercise 6: fname, lname and age in 3 different divs</p>
            <form action="day34-exercises.php" method ="POST">
                Firstname: <input type="text" name="fname6" />
                Lastname: <input type="text" name="lname6" />
                Age: <input type="number" name="age6" />
                Hobby: <input type="text" name="hobby6" />
                <input  type="submit" name="submit6"  />
            </form>
            <?php
            if( isset($_POST['submit6'])) {
                if(!$_POST['fname6'] || !$_POST['lname6'] || !$_POST['age6'] || !$_POST['hobby6']) {
                    echo 'input missing!';
                } else {
                    echo '<div class="w-100 d-flex my-2">'.
                        '<div class="myCard '.checkStringLength($_POST['fname6']).'">' . $_POST['fname6'] . '</div>'.
                        '<div class="myCard '.checkStringLength($_POST['lname6']).'">' . $_POST['lname6'] . '</div>'.
                        '<div class="myCard '.checkAge($_POST['age6']).'">'. $_POST['age6'] . '</div>'.
                        '<div class="myCard '.checkStringLength($_POST['hobby6']).'">' . $_POST['hobby6'] . '</div>'.
                        '</div>';
                }
            }
            function checkStringLength($myString){
                if(strlen($myString) <= 5){
                    $fontColor = 'myRed';
                } else {
                    $fontColor = 'myGreen';
                }
                return $fontColor;
            }
            function checkAge($myAge){
                if($myAge <= 18){
                    $fontColor = 'myRed';
                } else {
                    $fontColor = 'myGreen';
                }
                return $fontColor;
            }


            ?>
        </div>

        <div class="border p-3">
            <p>advanced exercise: f to c </p>
            <form action="day34-exercises.php" method ="POST">
                degrees farenheit: <input type="number" name="farenheit" />
                <input  type="submit" name="submit7"  />
            </form>
            <?php
            if( isset($_POST['submit7'])) {
                if(!$_POST['farenheit']) {
                    echo 'input missing!';
                } else {
                    echo '<div class="w-100 d-flex my-2 justify-content-center">'.
                        '<div class="myCard text-center bgImg'.checkTemp($_POST['farenheit'])[1].'">' .
                        $_POST['farenheit'] .'°F = '. convertFtoC($_POST['farenheit']) .'°C' . '<br>'.
                        checkTemp($_POST['farenheit'])[0].
                        '</div>'.
                        '</div>';
                }
            }
            function checkTemp($myTemp){
                if(convertFtoC($myTemp) <= 5){
                    $tempText = 'Very cold';
                    $tempImg = 'VeryCold';
                } elseif(convertFtoC($myTemp) <= 10) {
                    $tempText = 'Cold';
                    $tempImg = 'Cold';
                } elseif(convertFtoC($myTemp) <= 15) {
                    $tempText = 'Pleasant';
                    $tempImg = 'Pleasant';
                } elseif(convertFtoC($myTemp) <= 20) {
                    $tempText = 'Warm';
                    $tempImg = 'Warm';
                } else {
                    $tempText = 'Hot';
                    $tempImg = 'Hot';
                }
                $tempResult = [$tempText,$tempImg];
                return $tempResult;
            }
            function convertFtoC($myTemp){
                return round(($myTemp -32) * (5/9),2);
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
