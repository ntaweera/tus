<?php
include("connect.php");
$emp_id = $_POST["emp_id"];
$pen_id = $_POST["pen_id"];
$sql = "INSERT INTO borrow (emp_id, pen_id, borrow_date, borrow_time)
  VALUES ('$emp_id', '$pen_id', NOW(), CURRENT_TIME())";
if (mysqli_query($conn, $sql)) {
    header('Location: withdraw.html');
    exit;
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
  mysqli_close($conn);

?>