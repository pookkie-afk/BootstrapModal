<?php
$id = $_POST['id'];
require 'connectDB.php';
$sql ="select * from tablestudent where id = $id";
$result = mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
echo json_encode($row);