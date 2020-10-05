<?php include("connect.php"); 

// insert data

$action = $_REQUEST['action']?'updateform':'initform';
if($action=="insert"){
    $emp_id = $_POST["emp_id"];
    $emp_name = $_POST["emp_name"];
    $gender = $_POST["gender"];
    $dept_id = $_POST["dept_id"];
    $work_type_id = $_POST["work_type_id"];
    $emp_type_id = $_POST["emp_type_id"];

    $sql = "INSERT INTO employee (emp_id, emp_name, gender, dept_id, work_type_id, emp_type_id)
    VALUES ('$emp_id', '$emp_name', '$gender','$dept_id','$work_type_id','$emp_type_id')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
?>

<?php
// update data
if($action=="updateform"){  
    $emp_id = $_GET["emp_id"];
    $sql = "select * from employee where emp_id = '$emp_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $emp_name = $row["emp_name"];
    $gender = $row["gender"];
    $dept_id = $row["dept_id"];
    $work_type_id = $row["work_type_id"];
    $emp_type_id = $row["emp_type_id"];
    
?>
    <body>
<h1>แก้ไขข้อมูลพนักงาน</h1>
<p>เมนูข้อมูลพนักงาน</p>
<form method="post">
  <input type="hidden"  name="action" value="updatedata">
  <label for="emp_id">รหัสพนักงาน:</label>
  <input type="text" id="emp_id" name="emp_id" value="<?=$emp_id?>"><br>
  <label for="emp_name">ชื่อ-นามสกุล:</label>
  <input type="text" id="emp_name" name="emp_name" value="<?=$emp_name ?>"><br>
  <label for="gender">เพศ:</label>
  <select name="gender" id="gender">
  <?php
    if($gender=="M"){  
    ?>
    <option value="M" selected>ชาย</option>
    <option value="F">หญิง</option>

    <?php }else{ ?>
        <option value="M" >ชาย</option>
        <option value="F" selected>หญิง</option>

     <?php }  ?> 

   </select><br>
    <label for="dept_id">แผนก/ฝ่าย:</label>
  <select name="dept_id" id="dept_id">
    <?php       
        $sql = "select * from department";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
            ?>
                <option value="<?=$row["dept_id"]?>" <?php if($dept_id==$row["dept_id"]) echo "selected" ?> ><?=$row["dept_name"]?></option>
            <?php
            }  //end while loop
        }  //end if
    ?> 
   </select><br>

   <label for="work_type_id">กะ:</label>
  <select name="work_type_id" id="work_type_id">
    <?php
        
        $sql = "select * from work_type";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
            ?>
                <option value="<?=$row["work_type_id"]?>" <?php if($row["work_type_id"]==$work_type_id) echo "selected"  ?> ><?=$row["work_type_name"]?></option>

            <?php
            }  //end while loop
        }  //end if
    ?> 
   </select><br>
   <label for="emp_type_id">รายวัน/รายเดือน:</label>
  <select name="emp_type_id" id="emp_type_id">
    <?php
        
        $sql = "select * from emp_type";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
            ?>
                <option value="<?=$row["emp_type_id"]?>" <?php if($row["emp_type_id"]==$emp_type_id) echo "selected" ?> ><?=$row["emp_type"]?></option>

            <?php
            }  //end while loop
        }  //end if
        //mysqli_close($conn);
    ?> 
   </select><br>
   <input type="submit" value="แก้ไข">
</form>

<?php 
} 
?>

<!DOCTYPE HTML>
<html>
<meta charset="utf-8">
<head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
    <title>TUS</title>
<body>


<h1>สร้างข้อมูลพนักงาน</h1>
<?php if($action=='initform'){ ?>
<p>เมนูข้อมูลพนักงาน</p>
<form method="post">
  <input type="hidden"  name="action" value="insert">
  <label for="emp_id">รหัสพนักงาน:</label>
  <input type="text" id="emp_id" name="emp_id"><br>
  <label for="emp_name">ชื่อ-นามสกุล:</label>
  <input type="text" id="emp_name" name="emp_name"><br>
  <label for="gender">เพศ:</label>
  <select name="gender" id="gender">
    <option value="M">ชาย</option>
    <option value="F">หญิง</option>
   </select><br>
    <label for="dept_id">แผนก/ฝ่าย:</label>
  <select name="dept_id" id="dept_id">
    <?php       
        $sql = "select * from department";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
            ?>
                <option value="<?=$row["dept_id"]?>"><?=$row["dept_name"]?></option>

            <?php
            }  //end while loop
        }  //end if
    ?> 
   </select><br>

   <label for="work_type_id">กะ:</label>
  <select name="work_type_id" id="work_type_id">
    <?php
        
        $sql = "select * from work_type";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
            ?>
                <option value="<?=$row["work_type_id"]?>"><?=$row["work_type_name"]?></option>

            <?php
            }  //end while loop
        }  //end if
    ?> 
   </select><br>
   <label for="emp_type_id">รายวัน/รายเดือน:</label>
  <select name="emp_type_id" id="emp_type_id">
    <?php
        
        $sql = "select * from emp_type";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
            ?>
                <option value="<?=$row["emp_type_id"]?>"><?=$row["emp_type"]?></option>

            <?php
            }  //end while loop
        }  //end if
        //mysqli_close($conn);
    ?> 
   </select><br>
   <input type="submit" value="เพิ่ม">
</form>
    <?php } ?>
<?php
    $sql = "SELECT e.emp_id, e.emp_name, e.gender, d.dept_name,
    w.work_type_name, et.emp_type 
    FROM employee e, department d,work_type w, emp_type et
    WHERE e.dept_id = d.dept_id
    AND e.work_type_id = w.work_type_id
    AND e.emp_type_id = et.emp_type_id";
    $result = mysqli_query($conn, $sql);


?>
<table style="float:left">
  <tr>
    <th>รหัสพนักงาน</th>
    <th>ชื่อ</th>
    <th>เพศ</th>
    <th>แผน/ฝ่าย</th>
    <th>กะ</th>
    <th>รายวัน/รายเดือน</th>
    <th>แก้ไข</th>
    <th>ลบ</th>
  </tr>
  <?php  
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                if($row["gender"]=="M"){
                    $gender = "ชาย";
                }else{
                    $gender = "หญิง";
                }
  ?>
  <tr>
    <td><?=$row["emp_id"]?></td>
    <td><?=$row["emp_name"]?></td>
    <td><?=$gender?></td>
    <td><?=$row["dept_name"]?></td>
    <td><?=$row["work_type_name"]?></td>
    <td><?=$row["emp_type"]?></td>
    <td><a href="employee.php?emp_id=<?=$row["emp_id"]?>&action=updateform">แก้ไข</a></td>
    <td>ลบ</td>
  </tr>
  <?php 
            } // end while
        } // end if
 ?>
</table>

</body>
</head>
</html>