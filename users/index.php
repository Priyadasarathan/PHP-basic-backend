<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
  <br>
  <h3>Click here to add employee details <a href="addemployee.php"><button class="btn btn-success add">Add
        Employee</button></a></h3>
  <br>
  <br>
  <hr>

  <!-- 1. db connection -->
  <!-- 2. write query -->
  <!-- 3. execute query -->
  <!-- 4. display result -->
  <!-- 5. html design -->
  
  <?php
  // connection
  // $dbconnection = mysqli_connect("localhost", "root", "root123", "user_form");
  // if(!$dbconnection) {
  //   echo "connection failed".mysqli_error($dbconnection);
  // } else {
  //   // echo "db connected";
  // }
  // //select query from db
  // $query = "SELECT id, first_name, last_name, email_id, phone_number, status FROM user_details";
  // $result = mysqli_query($dbconnection, $query);
  // // print_r($result);
  // $numrows = mysqli_num_rows($result);
  // if($numrows > 0) {
  //   echo '<table class="dbtable">';
  //   echo '<tr>';
  //   echo '<th>S.No</th>';
  //   echo '<th>First Name</th>';
  //   echo '<th>Last Name</th>';
  //   echo '<th>Email ID</th>';
  //   echo '<th>Phone Number</th>';
  //   echo '<th>Status</th>';
  //   echo '<th>Actions</th>';
  //   // echo '<th>Actions</th>';
  //   echo '</tr>';
  //   // $row['id']=1;
  //   $num = 1;
  //   while($row = mysqli_fetch_assoc($result)) {
  //     // echo "<pre>";
  //     // print_r($row);
  //     $id = $row['id'];
  //     echo '<tr>';
  //     echo '<td>'.$num.'</td>';
  //     echo '<td>'.$row['first_name'].'</td>';
  //     echo '<td>'.$row['last_name'].'</td>';
  //     echo '<td>'.$row['email_id'].'</td>';
  //     echo '<td>'.$row['phone_number'].'</td>';
  //     echo '<td>'.$row['status'].'</td>';
  //     // $row['id']++; 
  //     $num++;
      ?>
      <!-- <td>
        <a href="<?php echo 'delete.php?id='.$id ?>" onclick="return confirm('Are you want to delete this row');">
          <i class="fa-regular fa-trash-can me-4"></i>
        </a>
        <a href="<?php echo 'edit.php?id='.$id ?>">
          <i class="fa-regular fa-pen-to-square"></i>
        </a>
      </td> -->
      <?php
  //     echo '</tr>';
  //     // echo "<pre>";
  //   }
  //   echo '</table>';
  // } else {
  //   echo "record not found".mysqli_error($dbconnection);
  // }

  // // Function definition 
  ?>

  
  <?php
  // connect to the database name
  
  $con = mysqli_connect("localhost", "root", "root123", "user_form");

  // variable to store number of rows per page
  
  // $limit = 5;
  
  // query to retrieve all rows from the table Countries
  
  $sql = "SELECT * FROM user_details";

  // get the result
  
  $res = $con->query($sql);


  $num_of_users = $res->num_rows;

  // get the required number of pages
  $number_of_per_page = 5;
  $total_pages = ceil($num_of_users / $number_of_per_page);

  // update the active page number
  $page = 1;
  if(isset($_GET['page'])) {
    $page = $_GET['page'];
  }
  // get the initial page number
  
  $start_limit = ($page - 1) * $number_of_per_page;

  $sql = "SELECT *FROM user_details LIMIT $start_limit, $number_of_per_page";
  $res = $con->query($sql);
  // print_r($res);
  $numrows = mysqli_num_rows($res);
  if($numrows > 0) {
    echo '<table class="dbtable">';
    echo '<tr>';
    echo '<th>S.No</th>';
    echo '<th>First Name</th>';
    echo '<th>Last Name</th>';
    echo '<th>Email ID</th>';
    echo '<th>Phone Number</th>';
    echo '<th>Status</th>';
    echo '<th>Actions</th>';
    echo '</tr>';
    $start = ($number_of_per_page * ($page-1))+1; 
    $num = $start;
    // var_dump($start);
    //display the retrieved result on the webpage  
    while($row = $res->fetch_assoc()) {
      // $num=$num+1;
     
      $id = $row['id'];
      // print_r($id);
      echo '<tr>';
      echo '<td>'.$num.'</td>';
      echo '<td>'.$row['first_name'].'</td>';
      echo '<td>'.$row['last_name'].'</td>';
      echo '<td>'.$row['email_id'].'</td>';
      echo '<td>'.$row['phone_number'].'</td>';
      echo '<td>'.$row['status'].'</td>';
      
      // print_r($row);
      $num++;
      
      ?>
      <td>
        <a href="<?php echo 'delete.php?id='.$id ?>" onclick="return confirm('Are you want to delete this row');">
          <i class="fa-regular fa-trash-can me-4"></i>
        </a>
        <a href="<?php echo 'edit.php?id='.$id ?>">
          <i class="fa-regular fa-pen-to-square"></i>
        </a>
      </td>
      <?php
      echo '</tr>';
      // echo "<pre>";
    }
    echo '</table>';
  }
  // if(!isset($_SESSION["count"])){//check if the array index "q" exists
  //   $_SESSION["count"] = 1;
  //    //index "q" dosen't exists, so create it with inital value (in this case: 1)
  //  }
  // else {
  //   $_SESSION["count"]++; //index "q" exists, so increment in one its value.
  // }
  // $count = $_SESSION["count"]; //here you have the final value of "q" already incremented or with default value 1.
  // //doSomethingWith($q);
 



  // show page number with link   
  echo "<div class='pagination'>";
  for($i = 1; $i <= $total_pages; $i++) {
    if($page == $i) {
    echo "<a  href = 'index.php?page={$i}' class='link active'>{$i} </a>";
    }else{
      echo "<a  href = 'index.php?page={$i}' class='link'>{$i} </a>";
    }
  }
  echo "</div>";
 

  ?>
 
  <style>
    .pagination {
      display: inline;
      margin-left: 40% !important;
     

    }

    .link {
      font-size: 30px;
      display: inline;
      border: 1px solid #ccc;
      text-decoration: none;
      padding: 3px;
      margin-left: 10px;
      
    }

    .active {
      background-color: green;
      color: white;
    }

    .add {
      margin-left: 50%;
    }

    .dbtable,
    .dbtable th,
    .dbtable td {
      border: 1px solid black;
      border-collapse: collapse;
      padding: 8px;
    }

    .dbtable {
      width: 800px;
      margin: auto;
    }
  </style>




</body>

</html>