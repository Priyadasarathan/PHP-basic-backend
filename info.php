<?php echo phpinfo();
//    <!-- <?php
   // define variables and set to empty values
   // $firstnameErr = $emailidErr = $phoneErr = $genderErr = $passwordErr = $statusErr = "";
   // $firstname = $emailid = $phone = $gender = $password = $status = "";
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       // if (empty($_POST["firstname"]) || empty($_POST["emailid"]) || empty($_POST["phone"]) || empty($_POST["gender"]) || empty($_POST["password"]) || empty($_POST["status"])) {
       if (empty($_POST["udfirstname"])) {
           $firstnameErr = "Name is required";
       } else {
           $firstname = $_POST["udfirstname"];
       }

       if (empty($_POST["udemailid"])) {
           $emailidErr = "Email is required";
       } else {
           $emailid = $_POST["udemailid"];
       }
       if (empty($_POST["udphone"])) {
           $phoneErr = "phone number is required";
       } else {
           $phone = $_POST["udphone"];
       }

       if (empty($_POST["udgender"])) {
           $genderErr = "gender is required";
       } else {
           $gender = $_POST["udgender"];
       }

       if (empty($_POST["udpassword"])) {
           $passwordErr = "password is required";
       } else {
           $password = $_POST["udpassword"];
       }

       if (empty($_POST["udstatus"])) {
           $statusErr = "status is required";
       } else {
           $status = $_POST["udstatus"];
       }
       // }
   } else {
       // echo "all fields are filled";
       // header('location:updateform.php');
   }

   // function test_input($data)
   // {
   //     $data = trim($data);
   //     $data = stripslashes($data);
   //     $data = htmlspecialchars($data);
   //     return $data;
   // }
   ?>




   <?php
   $first_name = $_POST["firstname"];
   $last_name = $_POST["lastname"];
   $email_id = $_POST["emailid"];
   $phone_number = $_POST["phone"];
   $gender = $_POST["gender"];
   $password = $_POST["password"];
   $status = $_POST["status"];
   $image = $_POST["choosefile"];



   $dbconnect = mysqli_connect("localhost", "root", "root123", "user_form");
   // $result = mysqli_query($dbconnect , $sql);
   if ($dbconnect) {
       echo "<br>";
       echo "<br>";
       // echo "database connected successfully<br>";
   
   } else {
       echo "database not connected properly " . mysqli_error($dbconnect);
   }
   $id = $_GET['id'];
   $query = "SELECT * FROM user_details WHERE id=$id";
   $result = mysqli_query($dbconnect, $query);
   // print_r($result);
   $numrows = mysqli_num_rows($result);
   // print_r($numrows);
   if ($numrows == 1) {
       $row = mysqli_fetch_assoc($result);
       // print_r($row);
   }

   //image select
   // $imgquery = "SELECT image from user_details where id=$id";
   // $show = mysqli_query($dbconnect, $imgquery);
   
   ?>

   <div class="addemployeeform empform p-5">
       <h2 class="text-center">Update form</h2><br><br>
       <form method="POST" action="" class="form">
           <input type="hidden" id="empid" name="empid" value="<?= $id ?>">
           First Name : <input type="text" name="udfirstname" value="<?= $row['first_name'] ?>" id="first_name">
           <span class="error">*
               <?php echo $firstnameErr; ?>
           </span>
           <br><br>

           Last Name : <input type="text" name="udlastname" value="<?= $row['last_name'] ?>" id="last_name"><br><br>
           Email ID : <input type="email" name="udemailid" value="<?= $row['email_id'] ?>" id="email_id">
           <span class="error">*
               <?php echo $emailidErr; ?>
           </span>
           <br><br>
           Phone Number : <input type="text" name="udphone" value="<?= $row['phone_number'] ?>" id="phone_number">
           <span class="error">*
               <?php echo $phoneErr; ?>
           </span>
           <br><br>
           Gender :
           <span class="error">*
               <?php echo $genderErr; ?>
           </span>

           <label><input type="radio" name="udgender" <?php if (isset($gender) && $gender == "female")
               $adopted = (isset($_POST['udstatus']) == 'female' ? 'female' : 'male');
           echo "checked"; ?>
                   value="female">Female</label>
           <label><input type="radio" name="udgender" <?php if (isset($gender) && $gender == "male")
               $adopted = (isset($_POST['udstatus']) == 'female' ? 'female' : 'male');
           echo "checked"; ?>
                   value="<?= $row['gender'] . $selected_val ?>">Male</label>
           <label><input type="radio" name="udgender" <?php if (isset($gender) && $gender == "other")
               echo "checked"; ?>
                   value="<?= $row['gender'] . $selected_val ?>">Other</label>
           <br><br>
           Password : <input type="password" name="udpassword" value="<?= $row['emp_password'] ?>">
           <span class="error">*
               <?php echo $passwordErr; ?>
           </span>
           <br><br>

           Status :
           <span class="error">*
               <?php echo $statusErr; ?>
           </span>
           <label><input type="radio" name="udstatus" id="status" value="<?= $row['status'] ?>" <?php if (isset($status) && $status == "Active")
                 $adopted = (isset($_POST['status']) == 'inactive' ? 'inactive' : 'active');
             echo "checked"; ?> value="<?= $row['status'] . $selected_val ?>">Active</label>
           <label><input type="radio" name="udstatus" id="status" value="<?= $row['udstatus'] ?>" <?php if (isset($status) && $status == "Inactive")
                 echo "checked"; ?> value="<?= $row['status'] . $selected_val ?>">Inactive</label>
           <br>
           <br>
           <input type="radio" name="udstatus" id="status" value="<?= $row['status'] ?>" <?php if (isset($status) && $status == "Delete")
                 echo "checked"; ?> value="delete">Delete<br><br> -->
           <input type="file" name="choosefile" value="<?= $row['image']?>" /><br><br>



           <a href="updateform.php"><button type="submit" value="Submit">update</button></a>
           <div>
               <img src="./uploads/<?php echo $row['image']; ?> " width=300>
           </div>
           

       </form>
   </div>
   
