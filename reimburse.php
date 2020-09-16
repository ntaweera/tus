<?php
include("connect.php");
$person_id = $_POST["person_id"];
$pen_id = $_POST["pen_id"];

$sql = "SELECT borrow_id, person_id, pen_id, borrow_date FROM borrow 
WHERE person_id = '$person_id' AND pen_id = '$pen_id'and return_date IS NULL
ORDER BY borrow_id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
    $row = $result->fetch_assoc();
    $borrow_id =  $row["borrow_id"];
    $sql = "UPDATE borrow SET
    return_date = NOW(),
    return_time = CURRENT_TIME()
    WHERE borrow_id = $borrow_id";

    if (mysqli_query($conn, $sql)) {
        header('Location: reimburse.html');
        exit;
    } else {
        echo "มีปัญหาบันทึกการคืน: " . mysqli_error($conn);
    }
    mysqli_close($conn);


} else {
  echo "ไม่พบข้อมูลการเบิก หรือมีการคืนแล้ว";
  mysqli_close($conn);
}



?>