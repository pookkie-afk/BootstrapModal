<?php
require 'connectDB.php';

$id = $_POST['id'];

$output = '';
$sql = "SELECT * FROM `tablestudent` WHERE id = $id ";
$result = mysqli_query($conn, $sql);

$output .= "<div class='table-responsive'>
<table class='table table-bordered'>";
while ($row = mysqli_fetch_array($result)) {
    $output .= '<tr> <td width="30%"> <label>Name</label></td> 
                    <td width="70%">' . $row['fname'] . '</td>
                </tr>';
    $output .= '<tr> <td width="30%"> <label>Lastname</label></td> 
                    <td width="70%">' . $row['lname'] . '</td>
                </tr>';
    $output .= '<tr> <td width="30%"> <label>Email</label></td> 
                    <td width="70%">' . $row['email'] . '</td>
                </tr>';
    $output .= '<tr> <td width="30%"> <label>Web</label></td> 
                <td width="70%">' . $row['web'] . '</td>
            </tr>';
}
$output .= "</table></div>";
echo $output;

