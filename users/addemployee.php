<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
</head>

<body>


    <?php error_reporting(0); ?>
    <?php
    $msg = "";
    // check if the user has clicked the button "UPLOAD"
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name = $_POST["firstname"];
        $last_name = $_POST["lastname"];
        $email_id = $_POST["emailid"];
        $phone_number = $_POST["phone"];
        $gender = $_POST["gender"];
        $emp_password = $_POST["password"];
        $status = $_POST["status"];
        $image = $_POST["choosefile"];

        $check_error = array();
        if (empty($_POST['firstname'])) {
            $firstnameErr = "firstName is required";
            array_push($check_error, 'false');
        }
        if (empty($_POST['lastname'])) {
            $lastnameErr = "lastName is required";
            array_push($check_error, 'false');
        }
        if (empty($_POST['emailid'])) {
            $emailidErr = "Email is required";
            array_push($check_error, 'false');
        } elseif (!filter_var($email_id, FILTER_VALIDATE_EMAIL)) {
            $emailidErr = "$email_id is a invalid email address";
            array_push($check_error, 'false');
        }

        if (empty($_POST['phone'])) {
            $phoneErr = "phone number is required";
            array_push($check_error, 'false');
        }
        if (empty($_POST['gender'])) {
            $genderErr = "gender is required";
            array_push($check_error, 'false');
        }
        if (empty($_POST['password'])) {
            $passwordErr = "password is required";
            array_push($check_error, 'false');
        }
        if (empty($_POST['status'])) {
            $statusErr = "status is required";
            array_push($check_error, 'false');
        }

        if (isset($_FILES["choosefile"]) && $_FILES["choosefile"]["error"] == 0) {
            $targetDir = "uploads/";
            $targetFile = $targetDir . basename($_FILES["choosefile"]["name"]);
            if (file_exists($targetFile)) {
                $imgErr = "Sorry, the file already exists.";
                array_push($check_error, 'false');
            }
        }

        /* Check email is already exists or not */
        $sql = "SELECT * FROM `user_details` WHERE `email_id` = " . $email_id;
        if ($dbconnect->query($sql) === TRUE) {
            $emailidErr = "$email_id email already Exits";
            // $emailidErr = "$email_id is a valid email address";
            array_push($check_error, 'false');
        }
        /* Check email is already exists or not */


        $check_final_error = array_unique($check_error);
        if (count($check_final_error) == 0) {
            // $image="";
            if (isset($_FILES["choosefile"]) && $_FILES["choosefile"]["error"] == 0) {
                $targetDir = "uploads/";
                $targetFile = $targetDir . basename($_FILES["choosefile"]["name"]);
                $image = basename($_FILES["choosefile"]["name"]);

                // Move the uploaded file to the specified directory
                if (!move_uploaded_file($_FILES["choosefile"]["tmp_name"], $targetFile)) {
                    echo "Sorry, there was an error uploading your file.";
                }
            }

            $SELECT = "SELECT email_id From user_details Where email_id = ? Limit 1";
            $sql = "INSERT INTO user_details(first_name, last_name, email_id, phone_number, gender, emp_password, status,image) values('$first_name', '$last_name', '$email_id', '$phone_number', '$gender', '$emp_password', '$status','$image')";

            $result = mysqli_query($dbconnect, $sql);
            if ($result) {
                header('location:index.php');
                echo "new record inserted successfully";
            } else {
                echo mysqli_error($dbconnect);
            }
        }
    }


    ?>

    <div class="addemployeeform empform p-5">
        <h2 class="text-center">Add employee details</h2><br><br>
        <form method="POST" action="addemployee.php" id="form" enctype="multipart/form-data">
            <!-- onsubmit="return validate();"  -->
            <div class="form-group">
                First Name : <input type="text" id="firstname" name="firstname" value="<?php echo $first_name ?>">
                <span class="errorrr">*
                    <?php echo $firstnameErr; ?>
                </span><span class="error"></span>
            </div>
            <br>
            <div class="form-group">
                Last Name : <input type="text" id="lastname" name="lastname" value="<?php echo $last_name ?>"><span
                    class="error"></span>
                <span class="errorrr">*
                    <?php echo $lastnameErr; ?>
                </span>
            </div><br>

            <div class="form-group">
                Email ID : <input type="text" id="emailid" name="emailid" value="<?php echo $email_id ?>"><span
                    class="error"></span>
                <span class="errorrr">*
                    <?php echo $emailidErr; ?>
                </span>
            </div><br>
            <div class="form-group">
                Phone Number : <input type="text" id="phone" name="phone" value="<?php echo $phone_number ?>"><span
                    class="error"></span>
                <span class="errorrr">*
                    <?php echo $phoneErr; ?>
                </span>
            </div><br>
            <div class="form-group">
                Gender :
                <!-- <?php var_dump($gender) ?> -->
                <label><input type="radio" class="gender" name="gender" <?php if (isset($gender) && $gender == "female")
                    echo "checked"; ?> value="female">Female</label>
                <label><input type="radio" class="gender" name="gender" <?php if (isset($gender) && $gender == "male")
                    echo "checked"; ?> value="male">Male</label>
                <label><input type="radio" class="gender" name="gender" <?php if (isset($gender) && $gender == "other")
                    echo "checked"; ?> value="other">Other</label>
                <span class="error"></span>
                <span class="errorrr">*
                    <?php echo $genderErr; ?>
                </span>
            </div><br>
            <div class="form-group">
                Password : <input type="text" id="password" name="password" value="<?php echo $emp_password ?>"><span
                    class="error"></span>
                <span class="errorrr">*
                    <?php echo $passwordErr; ?>
                </span>
            </div><br>
            <div class="form-group">
                Status :

                <label><input type="radio" id="status" name="status" <?php if (isset($status) && $status == "active")
                    echo "checked"; ?> value="active">Active</label>
                <label><input type="radio" id="status" name="status" <?php if (isset($status) && $status == "inactive")
                    echo "checked"; ?> value="inactive">Inactive</label>
                <span class="error"></span>
                <span class="errorrr">*
                    <?php echo $statusErr; ?>
                </span>
            </div>
            <br>
            <div class="form-group">
                <input type="file" id="choosefile" name="choosefile" />
                <span class="error"></span>
                <span class="errorrr">*
                    <?php echo $imgErr; ?>
                </span>
            </div><br>


            <br>

            <button type="submit" name="uploadfile" class='p-5'>Submit</button>
 

        </form>
    </div>

    <p id="demo"></p>

    <script type="text/javascript">

        function validate(field) {
            var isChecked = false;
            for (var i = 0; i < field.length; i++) {
                if (field[i].checked) {
                    isChecked = true;
                    break;
                }
            }

            return isChecked;
        }
        function validateInputs() {

            let firstname = document.querySelector('#firstname');
            let lastname = document.querySelector('#lastname');
            let emailid = document.querySelector('#emailid');
            let phone = document.querySelector('#phone');
            let password = document.querySelector('#password');
            // const gender = document.getElementById("form").elements["gender"].value;
            let gender = document.getElementsByName("gender");
            let status = document.getElementsByName('status');
            let choosefile = document.querySelector('#choosefile');

            let validateEmail = (emailid) => {
                return String(emailid)
                    .toLowerCase()
                    .match(
                        /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                    );
            };

            let success = true
            if (firstname.value === '') {
                success = false;
                setError(firstname, 'firstname is required')
            }
            else {
                setSuccess(firstname)
            }
            if (lastname.value === '') {
                success = false;
                setError(lastname, 'lastname is required')
            }
            else {
                setSuccess(lastname)
            }

            if (emailid.value === '') {
                success = false;
                setError(emailid, 'email is required')
            }
            else if (!validateEmail(emailid.value)) {
                success = false;
                setError(emailid, 'please enter a valid email')
            }
            else {
                setSuccess(emailid)
            }
            if (phone.value === '') {
                success = false;
                setError(phone, 'Mobile number is required')
            }
            else {
                setSuccess(phone);
            }

            if (password.value === '') {
                success = false;
                setError(password, 'Password is required')
            }
            else {
                setSuccess(password)
            }


            if (!validate(gender)) {
                success = false;
                setError(gender[0], 'Gender is required', 'radio')
            }
            else {
                setSuccess(gender[0], 'radio');
            }



            if (!validate(status)) {
                success = false;
                setError(status[0], 'status is required', 'radio')
            }
            else {
                setSuccess(status[0], 'radio');
            }
            if (choosefile.value === '') {
                success = false;
                setError(choosefile, 'file choosing is required')
            }
            else {
                setSuccess(choosefile);
            }
            // alert(success);
            // return false;
            return success;
        }

        //element-password, message-password is required
        function setError(element, message, from = "") {
            var formGroup = element.parentElement;
            if (from != "") {
                var errorElement = formGroup.parentElement.querySelector('.error');
                // alert(from);
                // console.log(radio_node);
                // return false;
                var formGroup = formGroup.parentElement;
            }
            else {
                var errorElement = formGroup.querySelector('.error');
            }
            // console.log(errorElement);
            errorElement.innerText = message;
            formGroup.classList.add('error')
            formGroup.classList.remove('success')
        }

        function setSuccess(element, from = '') {

            var formGroup = element.parentElement;
            if (from != "") {
                var errorElement = formGroup.parentElement.querySelector('.error');
                var formGroup = formGroup.parentElement;
            }
            else {
                var errorElement = formGroup.querySelector('.error');
            }
            errorElement.innerText = '';
            formGroup.classList.add('success')
            formGroup.classList.remove('error')
        }
    </script>

<script>
        document.querySelector("#form").addEventListener("submit", function (e) {
            e.preventDefault(); 
            if (validateInputs()) {
                document.getElementById("form").submit();
            } 
        });

    </script>

    <style>
        .empform {
            padding-left: 40%;
            background-color: skyblue;
        }

        #form .error {
            color: rgb(242, 18, 18);
            font-size: 15px;
            margin-top: 5px;
        }

        .form-group.success input {
            border-color: #0cc477;
        }

        .form-group.error input {
            border-color: rgb(206, 67, 67);
        }

        .errorrr {
            color: red;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>