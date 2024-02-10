<!DOCTYPE html>
<html>
<head>
    <title>Image Upload in PHP</title>
    <!-- <! link the css file to style the form > -->
</head>
<body>
    <div id="wrapper">
        <!--
        <! specify the encoding type of the form using the
                enctype attribute > -->
        <form method="POST" action="#" enctype="multipart/form-data">
            <input type="file" name="choosefile" />
            <div>
               <input type="submit" value="upload" name="uploadfile">
            </div>
        </form>
    </div>
    <?php
    error_reporting(0);
    ?>
    <?php
    $msg = "";
    // check if the user has clicked the button "UPLOAD"
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if the form was submitted with a file upload
        if (isset($_FILES["choosefile"]) && $_FILES["choosefile"]["error"] == 0) {
            $targetDir = "uploads/";
            $targetFile = $targetDir . basename($_FILES["choosefile"]["name"]);
            $filename=basename($_FILES["choosefile"]["name"]);

            // Check if the file already exists
            if (file_exists($targetFile)) {
                echo "Sorry, the file already exists.";
            } else {
                // Move the uploaded file to the specified directory
                if (move_uploaded_file($_FILES["choosefile"]["tmp_name"], $targetFile)) {
                    $db = mysqli_connect("localhost", "root", "root123", "img");
                    if ($db) {
                        $sql = "INSERT INTO image_table1(filename) VALUES ('$filename')";
                        mysqli_query($db, $sql);
                    }
                    echo "The file " . basename($_FILES["choosefile"]["name"]) . " has been uploaded.";


                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        } else {
            echo "No file was uploaded.";
        }
    }

    ?>
    <!-- <div id="display-image">
        <?php
        $query = " select * from image_table ";
        $result = mysqli_query($db, $query);
        print_r($result);
        while ($data = mysqli_fetch_assoc($result)) {
            ?>
            <img src="./image/<?php echo $data['filename']; ?>">
            <?php
        }
        ?>
    </div> -->
    <!-- The following CSS code is for giving a basic styling to the HTML form. -->
    <style>
        #wrapper {
            width: 50%;
            margin: 20px auto;
            border: 2px solid #DAD7D7;
        }
        form {
            width: 50%;
            margin: 20px auto;
        }
        form div {
            margin-top: 5px;
        }
        img {
            float: left;
            margin: 5px;
            width: 280px;
            height: 120px;
        }
        #img_div {
            width: 70%;
            padding: 5px;
            margin: 15px auto;
            border: 1px solid #DAD7D7;
        }
        #img_div:after {
            content: "";
            display: block;
            clear: both;
        }
    </style>
</body>
</html>
