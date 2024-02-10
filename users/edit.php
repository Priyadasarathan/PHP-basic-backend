<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
</head>

<body>

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
        <form method="POST" action="updateform.php" id="form" class="form">
            <input type="hidden" id="empid" name="empid" value="<?= $id ?>">
            <div class="form-group">
                First Name : <input type="text" name="udfirstname" id="firstname" value="<?= $row['first_name'] ?>">
                <span class="error"></span>
                <span class="errorrr">*
                    <?php echo $firstnameErr; ?>
                </span>
            </div>
            <br>
            <div class="form-group">
                Last Name : <input type="text" id="lastname" name="udlastname" value="<?= $row['last_name'] ?>"
                    id="last_name">
                <span class="error"></span>
            </div>
            <br>
            <div class="form-group">
                Email ID : <input type="email" id="emailid" name="udemailid" value="<?= $row['email_id'] ?>"
                    id="email_id">
                <span class="error"></span>
                <span class="errorrr">*
                    <?php echo $emailidErr; ?>
                </span>
            </div>
            <br>
            <div class="form-group">
                Phone Number : <input type="text" id="phone" name="udphone" value="<?= $row['phone_number'] ?>"
                    id="phone_number">
                <span class="error"></span>
                <span class="errorrr">*
                    <?php echo $phoneErr; ?>
                </span>
            </div>
            <br>
            <div class="form-group">
                Gender :
               

                <label><input type="radio" name="udgender" value="female" <?= ($row['gender'] == 'female') ? 'checked' : '' ?>>Female</label>
                <label><input type="radio" name="udgender" value="male" <?= ($row['gender'] == 'male') ? 'checked' : '' ?>>Male</label>
                <label><input type="radio" name="udgender" value="other" <?= ($row['gender'] == 'other') ? 'checked' : '' ?>>Other</label>
                <span class="error"></span>
                <span class="errorrr">*
                    <?php echo $genderErr; ?>
                </span>
            </div>
            <br>
            <div class="form-group">
                Password : <input type="password" id="password" name="udpassword" value="<?= $row['emp_password'] ?>">
                <span class="error"></span>
                <span class="errorrr">*
                    <?php echo $passwordErr; ?>
                </span>
            </div>
            <br>
            <div class="form-group">
                Status :
               
                <label><input type="radio" name="udstatus" value="active" <?= ($row['status'] == 'active') ? 'checked' : '' ?>>Active</label>
                <label><input type="radio" name="udstatus" value="inacitve" <?= ($row['status'] == 'inactive') ? 'checked' : '' ?>>Inactive</label>
                <span class="error"></span>
                <span class="errorrr">*
                    <?php echo $statusErr; ?>
                </span>
            </div>
            <br>
            <div class="form-group">
                <input type="file" id="choosefile" name="choosefile" value="<?= $row['image'] ?>" />
                <span class="error"></span>
            </div>
            <br><br>



            <button type="submit" value="Submit">update</button>
            <div>
                <img src="./uploads/<?php  if(isset($image)=='image')?>  <?php echo $row['image'];  ?>" width=300>
                
            </div>
            

        </form>
    </div>
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
            let gender = document.getElementsByName("udgender");
            let status = document.getElementsByName('udstatus');
            // let choosefile = document.querySelector('#choosefile');

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
            // if (choosefile.value === '') {
            //     success = false;
            //     setError(choosefile, 'file choosing is required')
            // }
            // else {
            //     setSuccess(choosefile);
            // }
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
            background-color: pink;
        }
        #form .error {
            color: rgb(242, 18, 18);
            font-size: 15px;
            margin-top: 5px;
        }

        .errorrr {
            color: red;
        }
        .form-group.success input {
            border-color: black;
        }

        .form-group.error input {
            border-color: rgb(206, 67, 67);
        }

    </style>
</body>

</html>