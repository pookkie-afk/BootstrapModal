<?php
$id = $_POST['id'];

require 'connectDB.php';

$sql = "DELETE from tablestudent where id = $id" ;
$result = mysqli_query($conn,$sql);
