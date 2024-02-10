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
    
    if (isset($_POST['uploadfile'])) {

        $filename = $_FILES["choosefile"]["name"];
        $tempname = $_FILES["choosefile"]["tmp_name"];

        $imageArr=explode('.',$filename);
        $rand=rand(10000,99999);
        $newImageName=$imageArr[0].$rand.'.'.$imageArr[1];
        $uploadPath="uploads/".$newImageName;

        if (move_uploaded_file($_FILES["choosefile"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["choosefile"]["name"])). " has been uploaded.";
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        var_dump($uploadPath);
        exit;
        // $isUploaded=move_uploaded_file($_FILES["image"]["tmp_name"],$uploadPath);
        // var_dump($isUploaded);

        if($isUploaded)
            echo 'successfully file uploaded';
        else
            echo 'something went wrong'; 
     
        exit;   
        // $folder = "images/". $filename;

        // connect with the database
        //$image = base64_encode($filename);
    
        // $db = mysqli_connect("localhost", "root", "root123", "img");
        if ($db) {
            echo "db connected successfully";
            echo "<br>";
        } else {
            echo "not connected" . mysqli_error($db);
        }
        // query to insert the submitted data
    
        $sql = "INSERT INTO image_table1(filename) VALUES ('$filename')";
       
        
         mysqli_query($db, $sql);
        // function to execute above query
    
        // $result = mysqli_query($db, $sql);
        // if($result){
        //     echo "image uploaded";
        // }
        // else{
        //     echo "Image not uploaded". mysqli_error($db);
        // }
    
        // Add the image to the "image" folder"
    
        if (move_uploaded_file($tempname, $folder)) {
            // if($result){
            echo "Image uploaded successfully";

        } else {

            echo "Failed to upload image : " . mysqli_error($db);

        }

    }

    // $result = mysqli_query($db, "SELECT * FROM image");
    
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

            border: 2px solid #dad7d7;

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

            border: 1px solid #dad7d7;

        }

        #img_div:after {

            content: "";

            display: block;

            clear: both;

        }
    </style>
</body>

</html>