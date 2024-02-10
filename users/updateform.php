<?php

// if (isset($_GET['id'])) {
//     $id = $_GET['id'];
    $udconn = mysqli_connect("localhost", "root", "root123", "user_form");
    if ($udconn) {
        echo "database connected successfully<br>";

    } else {
        echo "database not connected properly " . mysqli_error($udconn);
    }
    // SET  @num := 0;
    // $query=" UPDATE your_table SET id = @num := (@num+1)";
    // $query1="ALTER TABLE `your_table` AUTO_INCREMENT = 1";
    $id=$_POST['empid'];
    $firstname = $_POST['udfirstname'];
    $lastname = $_POST['udlastname'];
    $emailid = $_POST['udemailid'];
    $phonenumber = $_POST['udphone'];
    $gender = $_POST['udgender'];
    $password = $_POST['udpassword'];
    $udstatus = $_POST['udstatus'];
    $image = $_POST['choosefile'];
    $sql = "UPDATE user_details SET first_name='$firstname', last_name='$lastname', email_id='$emailid', phone_number='$phonenumber', gender='$gender', emp_password='$password', status='$udstatus', image='$image'  WHERE id=$id";
    
    $update = mysqli_query($udconn, $sql);
    if ($update) {
        header('location:index.php');
    } else {
        echo "update query not work" . mysqli_error($udconn);
    }


?>