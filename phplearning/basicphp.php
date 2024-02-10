<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic php</title>
</head>

<body>
    <!-- how to print -->
    <?php
    $name = "Akil YouTuber";
    $intension = "comrade of the world";
    echo "<h1>$name</h1> always positive", ' ', $intension;
    ?>


    <!-- concatination -->
    <?php
    $name1 = 'JTS Fam';
    $name2 = 'Unique content';
    $name = $name1 . ' ' . $name2;
    echo "<h1>$name</h1>";
    ?>


    <!-- Array index -->
    <?php
    $array = ['Akil', 'Divya', 'Riyas', 'monisha'];
    print_r($array);
    echo "<br>$array[0]";
    ?>


    <!-- Associate array -->
    <?php
    $name = ['$name1' => 'Akil', '$name2' => 'comrade'];
    // print_r($name);
    $name['$name3'] = 'Achieve more';
    print_r($name);
    echo '<br>';
    ?>


    <!-- Operators -->
    <?php
    $a = 50;
    $b = 20;
    $c = $a + $b . '<br>';
    $c .= $a - $b . '<br>';
    $c .= $a * $b . '<br>';
    $c .= $a / $b . '<br>';
    $c .= $a % $b . '<br>';
    echo $c;
    echo '<br>';
    echo '<br>';
    ?>

    <!-- Relation operators -->
    <?php
    $a = 50;
    $b = 200;
    if ($a > $b) {
        echo "a is greater than b";
    } else {
        echo "b is greater than a";
    }
    echo '<br>';
    echo '<br>';
    ?>

    <!-- Logical operators -->
    <?php
    $a = 90;
    $b = 200;
    if ($a > 100 || $b > 100) {
        echo "Both statements are true";
    } else {
        echo "First or second statement false";
    }
    echo '<br>';
    echo '<br>';
    ?>

    <!-- Increament and Decreament -->
    <?php
    $value = 13;
    $value++;
    echo $value;
    echo '<br>';
    echo '<br>';
    ?>

    <!-- Shorthand operators -->
    <?php
    $a = 10;
    $a += 10;
    echo $a;
    echo '<br>';
    echo '<br>';
    ?>

    <!-- Ternary operators -->
    <!-- syntax=> expresion(condition)?expresion1:expresion2 -->
    <?php
    $a = 90;
    $b = 200;
    $c = $a < $b ? 'statement true' : 'statement false';
    echo $c;
    echo '<br>';
    echo '<br>';
    ?>

    <!-- Switch statement -->
    <?php
    $a = 98;
    switch ($a) {
        case $a <= 34:
            echo "bad mark";
            break;
        case $a <= 50:
            echo "Need more practise";
            break;
        case $a <= 70:
            echo "Good condition";
            break;
        case $a <= 90:
            echo "Very Good  !!";
            break;
        case $a <= 100:
            echo " Great !!! Very Good ****";
            break;
        default:
            echo "not a mark";
    }
    echo '<br>';
    echo '<br>';
    ?>
    <?php
    $a = 50;
    switch ($a) {
        case $a <= 34:
            echo "Bad mark";
            break;
        case $a <= 50;
            echo "Need more practise";
            break;
        case $a <= 70;
            echo "Good condition!!";
            break;
        case $a <= 90;
            echo " Very Good ";
            break;
        case $a <= 100:
            echo "Great!!! Very Good****";
            break;
        default:
            echo "not a mark";
    }
    echo "<br>";
    echo "<br>";
    ?>

    <!-- while statement -->
    <?php
    $a = 0;
    while ($a < 10) {
        $a++;
        echo "$a" . '<br>';
    }
    ?>

    <!-- For loop condtion -->
    <?php
    for ($a = 1; $a <= 10; $a++)
        echo $a . '<br>';
    echo '<br>';
    echo '<br>';
    ?>

    <!-- include file  -->
    <?php
    include "forloop.php";
    ?>

    <!-- Anonymous function -->
    <?php
    $name = function ($first, $second) {
        return ("$first $second");
    };
    echo $name("Akil", "Dear Comrade");
    echo '<br>';
    echo '<br>';
    ?>

    <!-- Passing Arguments -->
    <?php
    function add($a, $b)
    {
        $c = $a + $b;
        return $c;
    }
    echo "Passing the arguments " . add(5, 5);
    echo '<br>';
    echo '<br>';
    // now reference
    $number1 = 10;
    $number2 = 10;
    function adding($num1, $num2)
    {
        $add = $num1 + $num2;
        return $add;
    }
    $addingvalue = add($number1, $number2);
    echo "passing by reference " . $addingvalue;
    echo '<br>';
    echo '<br>';
    ?>

    <!-- Builtin functions -->
    <?php
    $name = "Akil always a Great MAN and GEM of the world";
    echo 'String length ' . strlen($name);
    echo '<br>';
    echo '<br>';
    echo 'String word count ' . str_word_count($name);
    echo '<br>';
    echo '<br>';
    echo 'String word replace ' . str_replace('MAN', 'PERSON', $name);
    echo "<br>";
    echo strtoupper($name);
    echo '<br>';
    echo '<br>';
    ?>
    <?php
    $name = "Akil always a Great MAN and GEM of the world";
    echo 'String length' . Strlen($name);
    echo '<br>';
    echo '<br>';
    echo 'String word count' . str_word_count($name);
    echo '<br>';
    echo '<br>';
    echo 'String word replace' . str_replace('MAN', 'PERSON', $name);
    echo "<br>";
    echo strtoupper($name);
    echo "<br>";
    echo "<br>";
    ?>

    <br><br>
    <form method="GET" action="basicphp.php" id="form">
        <label>NAME</label>
        <input type="text" name="name" required><br><br>
        <label>PASSWORD</label>
        <input type="password" name="pass" required><br><br>
        <label>EMAIL</label>
        <input type="email" name="email" required><br><br>
        <button type="submit" name="submit">Submit</button>
    </form>

    <!-- <?php
    function formsubmit()
    {
        if ($_GET) {
            echo print_r($_GET);
        } else {
            echo print_r($_POST);
        }
    }
    formsubmit()

        ?> -->

    <?php
    //connect to the server
    $conn = new mysqli('localhost', 'root', 'root123', 'user');
    //check the connection
    if (mysqli_connect_errno()) {
        echo ("connect failed:" . mysqli_connect_error());
    } else {
        echo "<br> Database connected<br>";
    }
    //close the connection
    if ($conn->close()) {
        echo "<br> connection closed";
    }
    echo '<br>';
    echo '<br>';
    ?>
    <!-- syntax -->
    <?php
    $color = 'green';
    echo "my favorite color " . $color . "<br>";
    echo "my car color " . $color . "<br>";
    echo "my computer color " . $color . "<br>";
    echo '<br>';
    echo '<br>';
    ?>

    <!-- Variables -->
    <?php
    $text = 'Next plan of Akil is world trip to planting a trees';
    $budget = 10000000;
    $vehicle = "car";
    echo $text;
    echo '<br>';
    echo $budget;
    echo '<br>';
    echo $vehicle;
    echo '<br>';
    echo "Time to be start $text !!!!!!!!";
    echo '<br>';
    echo '<br>';
    echo '<br>';
    ?>

    <!-- Variables inside the function doesn't workout -->
    <?php
    $number = 10;
    function myfunction()
    {
        echo "inside of the function variable does not work <br>";
        // echo $number;
        // return $number;
    }
    myfunction();
    echo $number;
    ?>

    <!-- outside -->
    <?php

    function outside()
    {
        $num = 10;
        echo "inside of the function variable $num <br>";
        // echo $number;
        // return $number;
    }
    outside();
    echo "this outside doesn't work $num<br> <br> <br>";
    ?>

    <!-- Global variables using global key word-->
    <?PHP
    $x = 13;
    $y = 14;
    function myglobal()
    {
        global $x, $y;
        $y = $x + $y;
    }
    myglobal();
    echo $y;
    echo "<br>";
    echo "<br>";
    ?>

    <!-- Integer declared -->
    <?PHP
    $int = 13;
    $int1 = 13.14;
    var_dump(is_int($int));
    var_dump(is_int($int1));
    echo (pi());
    echo "<br>";
    echo "<br>";
    ?>

    <!-- Find max min in collection -->
    <?php
    echo (max(10, 20, 46, 13, 87, 94, 677, 9076, 565));
    echo "<br>";
    echo (min(456, 878, 23, 11, 34, 98, 34, 67, 890998, 766));
    echo "<br>";
    echo (sqrt(64));
    echo "<br>";
    echo (abs(-20));
    echo "<br>";
    echo (round(55.49));
    echo "<br>";
    echo (rand());
    echo "<br>";
    echo (rand(10, 20));
    echo "<br>";
    echo "<br>";
    ?>

    <!-- Array -->
    <?php
    $const = ['nano', 'mahendra', 'zuzuki'];
    echo "I like " . $const[1] . " car but I have a " . $const[2] . ", I ever never like the " . $const[0] . " car";
    ?>

    <!-- Include html tags -->
    <div class="div1">
        <?php
        echo "<h1 align='center'>Welcome php</h1>";
        echo "<p align='center'><a href='https://www.youtube.com/watch?v=0fPoQzCqx5o&list=PL4unWLKFsZfdrMitLmm8N-idlYQkSCvT9&index=2&ab_channel=TutorJoe%27sStanley'>Click here! for more reference</a></p>";
        ?>
    </div>

    <!-- Variable declaration -->
    <?php
    $pivalue = 3.15675654;
    $intvalue = 13;
    $name = "Welcome php";
    echo "The value of pi is: ", $pivalue, "<br>", "The whole number: ", $intvalue, "<br>", "The string words: ", $name;
    ?>

    <!-- Swapping -->
    <?php
    echo "<h1>Swapping</h1>";
    $a = 13;
    $b = 14;
    echo "Before swapping <br>", "A: ", $a, "<br>", "B: ", $b;
    $c = $a;
    $a = $b;
    $b = $c;
    echo "<br> After swapping <br>", "A: ", $a, "<br>", "B: ", $b;
    ?>

    <!-- Array slice and merge -->
    <?php
    echo "<h1 align='center'>Array slice and merge</h1>";
    $array1 = ['Akil', 'Yogi', 'Divya', 'Monisha', 'Riyas', 'Princy', 'Niyas'];
    echo "<pre>";
    print_r($array1);
    echo "<br>";
    $slice = array_slice($array1, 3, 4);
    print_r($slice);
    $array2 = ['Ram', 'Subash', 'Dhinesh', 'Jeeva', 'Ajith', 'Hemant'];
    print_r($array2);
    $merge = array_merge($array1, $array2);
    print_r($merge);
    ?>

    <!-- flipping change the values to keys -->
    <?php
    $array3['music'] = ['ani'];
    $array3['cutie'] = ['jyo'];
    $array3['charm'] = ['karthi'];
    echo "<pre>";
    print_r($array3);
    $filip = array_flip($array3);
    ?>

    <!-- Implode and Explode  > array to string and string to array-->
    <?php
    $a = ("ani, jyo, suriya, karthi, sangitha, vijay, shalini, ajith <br>");
    echo $a;
    $act = explode(',', $a);
    print_r($act);
    foreach ($act as $b) {
        echo 'Actors: ', $b, '<br>';
    }
    $implode = implode(' * ', $act);
    // echo $implode; this also used
    print_r($implode);
    ?>

    <!-- Functions usage -->
    <?PHP
    echo "<h2>Function usage<h1>";
    function adition($num19, $num10)
    {
        $adding = $num19 + $num10;
        echo "<h3>Adding two numbers: </h3>", $adding;
    }
    adition(20, 30);
    function subtract($num39, $num20)
    {
        $subtract = $num39 - $num20;
        return $subtract;
    }
    echo "<h3>subtract two numbers: </h3>", subtract(40, 10);
    echo "<br>";
    echo "<br>";
    ?>

    <!-- ceil or numaric function -->
    <?PHP
    $numceil = 13.1;
    echo ceil($numceil), "<br>";
    echo floor($numceil), "<br>";
    echo log($numceil), "<br>";
    // echo power($numceil), "<br>";
    $stringtrim = 'Akil always a Great Man in the world    and He is the   one man army .  ';
    // $stringtrim = 'a  b   c d';
    echo trim($stringtrim);
    echo "<br>";
    echo substr($stringtrim, 0, 4);
    echo "<br>";
    echo "<br>";
    echo date("d/m/y");
    ?>

    <!-- database connection -->
    <?php
    //connection declaration
    $severname = "localhost";
    $username = "root";
    $password = "root123";
    $database = "register";
    //connecting processing
    $conn = mysqli_connect($servername, $username, $password, $database);
    //connection checking
    if (!$conn) {
        echo "database conncetion failed<br>" . mysqli_connect_error();
    } else {
        echo "database connected successfully<br>";
    }
    //insert the values
    $sql = "INSERT INTO `comrade2_table` (`id`, `comrade_name`, `comrade_email`)VALUES (3, 'Akil', 'Akil_jts@gmail.com')";

    $sql = "INSERT INTO `comrade2_table` (`id`, `comrade_name`, `comrade_email`)VALUES (4, 'Akil', 'Akil_jts@gmail.com')";
    $sql = "INSERT INTO `comrade2_table` (`id`, `comrade_name`, `comrade_email`)VALUES (2, 'Yogi', 'Yogi@gmail.com')";
    $sql = "INSERT INTO `comrade2_table` (`id`, `comrade_name`, `comrade_email`)VALUES (4, 'Surya', 'Surya@gmail.com')";
    $sql = "INSERT INTO `comrade2_table` (`id`, `comrade_name`, `comrade_email`)VALUES (5, 'Karthi', 'Karthi@gmail.com')";
    $sql = "INSERT INTO `comrade2_table` (`id`, `comrade_name`, `comrade_email`)VALUES (6, 'Surya', 'Surya@gmail.com')";
    $sql = "INSERT INTO `comrade2_table` (`id`, `comrade_name`, `comrade_email`)VALUES (7, 'Surya', 'Surya@gmail.com')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Values inserted successfully<br>";
    } else {
        echo "values not inserted please check it. " . mysqli_error($conn);
    }
    //affected rows shown
    mysqli_query($conn, "SELECT * FROM comrade2_table");
    echo "Affected rows: " . mysqli_affected_rows($conn);
    echo "<br>";
    //update rows check
    $sql = "UPDATE comrade2_table SET comrade_name='Monisha' WHERE id=3";
    $sql = "UPDATE comrade2_table SET comrade_email='Monisha@gmail.com' WHERE id=3";
    if (mysqli_query($conn, $sql)) {
        echo "Values updated successfully<br>";
    } else {
        echo "values not updated please check it. " . mysqli_error($conn);
    }
    //delete rows
    $sql = "DELETE FROM comrade2_table WHERE id=4";
    $sql = "DELETE FROM comrade2_table WHERE id=7";
    $result2 = mysqli_query($conn, $sql);
    if ($result2) {
        echo "Values deleted successfully<br>";
        echo "Affected the delete rows: " . mysqli_affected_rows($conn);
        echo "<br>";
    } else {
        echo "values not deleted please check it. " . mysqli_error($conn);
    }
    //selecting query
    $sql = "SELECT id, comrade_name FROM comrade2_table";
    $result3 = mysqli_query($conn, $sql);
    if ($result3) {
        echo "successfully select the id and name from comrade2_table<br>";
        echo "selected rows: " . mysqli_affected_rows($conn);
    } else {
        echo "No rows selected";
    }
    //count
    $sql = "SELECT COUNT(*) FROM comrade2_table";
    $result4 = mysqli_query($conn, $sql);
    if ($result4) {
        echo "comrade2_table counted<br> ";
    } else {
        echo "comrade2_table not counted.<br> " . mysqli_error($conn);
    }
    //joins using php
    // $sql = "SELECT "
    //SELECT column_name(s)
    // FROM table1
    // FULL OUTER JOIN table2
    // ON table1.column_name = table2.column_name
    // WHERE condition;
    
    // $result1 = mysqli_query($conn, $update);
    
    //check here to value insert or not
    //insert rows
    ?>

    <?PHP
    ?>

    <!-- mail sending using php -->
    <?php
    // $msg = "Hi this is from php";
    // $msg = wordwrap($msg, 70);
    // mail("priyadasarathan0506@gmail.com", "Openup", $msg);
    ?>
    <!-- mail send using ezmlm methods -->
    <!-- <?php
    // $user = "priyadasarathan0506@gmail.com";
    // $hash = ezmlm_hash($user);
    ?> -->
    <center>
        <form method="POST" action="basicphp.php">
            STUDENT DETAILS<br><br>
            NAME: <input type="text" name="stdname" required><br>
            CLASS: <input type="text" name="stdclass" required><br>
            <button type="submit" value="Submit">Submit</button>
        </form>
    </center>
    <?php
    $std_name = $_POST["stdname"];
    $std_class = $_POST["stdclass"];
    $con = mysqli_connect("localhost", "root", "root123", "register");
    $sql = "INSERT INTO std_table(std_name, std_class) values('$std_name', '$std_class')";
    $result5 = mysqli_query($con, $sql);
    if ($result5) {
        echo "<h1>Student details added in database successfully</h1>";
    } else {
        echo "Student details not added properly" . mysqli_error($con);
    }
    ?>
    <br>
    <br>

    <!-- Login form -->
    <div class="loginform p-5">
        <form method="POST" action="basicphp.php">
            <h2 class="text-center">LOGIN FORM</h2><br>
            UserID : <input type="text" name="userid" required><br>
            UserName : <input type="text" name="username" required><br>
            Password : <input type="password" name="password" required><br>
            <!-- Gender : <input type="radio" name="gender" required>Male<input type="radio" name="gender"> Female<input
            type="radio" name="gender">Other<br> -->
            <input type="radio" name="gender" <?php if (isset($gender) && $gender == "Female")
                echo "checked"; ?>
                value="female">Female
            <input type="radio" name="gender" <?php if (isset($gender) && $gender == "Male")
                echo "checked"; ?>
                value="male">Male
            <input type="radio" name="gender" <?php if (isset($gender) && $gender == "Other")
                echo "checked"; ?>
                value="other">Other<br>
            <button type="submit" value="Submit">Click to Submit</button>
        </form>

        <?php
        $user_id = $_POST["userid"];
        $user_name = $_POST["username"];
        $user_password = $_POST["password"];
        $gender = $_POST["gender"];
        $connect = mysqli_connect("localhost", "root", "root123", "register");
        $sql = "INSERT INTO login_form(id, user_name, user_password, gender) values('$user_id', '$user_name', '$user_password', '$gender')";
        $result6 = mysqli_query($connect, $sql);
        if ($result6) {
            echo "Login form stored successfully";
        } else {
            echo "Retry!!!  Login form failed" . mysqli_error($connect);
        }
        // $sql = "INSERT INTO `login_form` ( `user_name`, `user_password`,`gender`)VALUES ('Surya', '28', 'Male')";
        // $result7 = mysqli_query($connect, $sql);
        // if ($result7) {
        //     echo "Values inserted successfully<br>";
        // } else {
        //     echo "values not inserted please check it. " . mysqli_error($connect);
        // }
        ?>
    </div>

    <!-- Register form -->
    <!-- firstname, secondname, emailid, gender, qualification, percentage, native, Feedback -->
    <div class="regform">
        <h1>Registeration Form</h1>
        <form method="POST" action="basicphp.php">
            First Name : <input type="text" name="firstname" placeholder="Enter First Name" required>
            Second Name : <input type="text" name="secondname" placeholder="Enter Second Name" required>
            Email ID : <input type="email" name="emailid" placeholder="Enter Your Email id" required>
            Gender :
            <input type="radio" name="gender" <?php if (isset($gender) && $gender == "Female")
                echo "checked"; ?>
                value="female">Female
            <input type="radio" name="gender" <?php if (isset($gender) && $gender == "Male")
                echo "checked"; ?>
                value="male">Male
            <input type="radio" name="gender" <?php if (isset($gender) && $gender == "Other")
                echo "checked"; ?>
                value="other">Other<br>
            Select : <select id="quali" name="qualification" required>
                <option value="sel">Your Hightest qualification</option>
                <option value="B.Sc">B.Sc</option>
                <option value="M.Sc">M.Sc</option>
                <option value="BCA">BCA</option>
                <option value="MCA">MCA</option>
                <option value="B.Sc">BE </option>
                <option value="M.Sc">Bio-tech</option>
                <option value="BCA">ME</option>
                <option value="MCA">B-Tech</option>
            </select>
            Percentage : <input type="text" name="percentage" placeholder="Degree percentage" required>
            Native : <input type="text" name="native" placeholder="Your Native" required>
            Feedback : <textarea type="text"  name="feedback" placeholder="Type Your comments!!!"
                required></textarea>
            <button type="submit" value="submit">Submit Your Register Form</button>

        </form>

        <!-- php code for registeration form -->
        <?php
        $firstname = $_POST["firstname"];
        $secondname = $_POST["secondname"];
        $emailid = $_POST["emailid"];
        $gender = $_POST["gender"];
        $qualification = $_POST["qualification"];
        $percentage = $_POST["percentage"];
        $native = $_POST["native"];
        $feedback = $_POST["feedback"];
        $dbconnect = mysqli_connect("localhost", "root", "root123", "register");
        $sql = "INSERT INTO Reg_form1(first_name, second_name, email_id, gender, qualification, percentage_reg, native_reg, feedback_reg) values('$firstname', '$secondname', '$emailid' '$gender','$qualification', '$percentage', '$native', '$feedback')";
        $result7 = mysqli_query($dbconnect, $sql);
        if($result7){
            echo "Resgisteration form updated in database successfully ";
        }
        else{
            echo "Oopsss.....Try Again!!!  " .mysqli_error($dbconnect);
            echo "<br>";
        }
        
        $sql = "INSERT INTO `Reg_form1` (`first_name`, `second_name`, `email_id`, `gender`, `qualification`, `percentage_reg`, `native_reg`, `feedback_reg`)VALUES ('Akil', 'Jts', 'Akil_jts@gmail.com', 'Male', 'M.Sc', '80%', 'Chennai', 'Try new things')";
        $result8 = mysqli_query($dbconnect, $sql);
        if($result8){
            echo "Inserted successfully";
        }
        else{
            echo "Not inserted properly" .mysqli_error( $dbconnect);
        }
        ?>

    </div>


    <style>
        .div1 {
            background-color: skyblue;
        }

        .loginform {
            margin: 0;
            padding: 0;
            background-color: #4e0c83;
            color: white;
            padding-left: 30%;
            padding-bottom: 5%;
        }

        .loginform h2 {
            margin-left: 20%;
        }

        .loginform button {
            margin-left: 10%;
            padding: 10px;
            font-size: 14px;
            border-radius: 10px;
            border: none;
        }

        .loginform input {
            border-radius: 10px;
        }

        .regform {
            margin: 0;
            padding: 0;
            background-color: #75E68A;
        }

        .regform h1 {
            text-align: center;
        }

        .regform form {
            margin-left: 30%;
        }

        .regform input,
        select,
        button {
            margin: 10px;
            /* border-radius:10px; */
            padding: 5px 10px;
        }

        .regform button {
            margin-left: 8%;
            margin-top: 5%;
            padding: 10px;
            font-size: 14px;
            /* border-radius: 10px; */
            border: none;
        }
    </style>
</body>

</html>