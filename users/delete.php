<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // connection
    $dbconn = mysqli_connect("localhost", "root", "root123", "user_form");
    if (!$dbconn) {
        echo "connection failed" . mysqli_error($dbconn);
    } else {
        //   echo "db connected";
    }
    $query = "DELETE FROM user_details WHERE id=$id";
    $delete = mysqli_query($dbconn, $query);
    if ($delete) {
        header('location:index.php');
    } else {
        echo "delete query not work" . mysqli_error($dbconn);
    }
}else{
    echo "value not come";
}
?>