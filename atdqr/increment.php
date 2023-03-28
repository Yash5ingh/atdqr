<?php
include_once 'conn.php';
$en = $_GET['e'];
date_default_timezone_set('Asia/Kolkata');

 if(!isset($_COOKIE['attuser']))
 {
    echo("<script>window.location = 'login.php?e=$en';</script>");
    exit();
 }
$sql = "SELECT * FROM students;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$d = date('d_m_Y');
$d = strval($d);

if(! isset($row[$d]) ){
     $sql = "ALTER TABLE students ADD $d INT NOT NULL DEFAULT 0;";
     $result = mysqli_query($conn, $sql);
    $sql = "INSERT INTO lectures (dates) VALUES ('$d');";
    $result = mysqli_query($conn, $sql);
}



$sql = "SELECT * FROM students;";
$result = mysqli_query($conn, $sql);
$checkresult = mysqli_num_rows($result);

if($checkresult > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        if($row['enroll'] == $en)
        {
            if($row[$d] <= 0)
            {
                $a =  $row['attcoun'] + 1;
                $sql = "UPDATE students
                SET attcoun = $a
                WHERE enroll = '$en';";
                $result = mysqli_query($conn, $sql);

                $sql = "UPDATE students
                SET $d = 1
                WHERE enroll = '$en';";
                $result = mysqli_query($conn, $sql);
            }
            
            echo("<script>window.location = 'index.php';</script>");
        }
    }
    echo("<script>alert('student does not exisit');</script>");
}
echo("<script>window.location = 'index.php';</script>");
?>
