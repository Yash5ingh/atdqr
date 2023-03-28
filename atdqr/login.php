<?php
include_once 'conn.php';
$en = $_GET['e'];

if(isset($_COOKIE['attuser']))
{
    echo("<script>window.location = 'increment.php?e=$en';</script>");
    exit();
}


if (isset($_POST['sub'])){
    $uname = ($_POST['uname']);             
    $pass = ($_POST['upass']); 


$sql = "SELECT * FROM users where username='".$uname."' and pass='".$pass."' limit 1;";
        $result = mysqli_query($conn, $sql);
        $checkresult = mysqli_num_rows($result);

        if($checkresult == 1)
        {
            echo "<script>document.cookie='attuser=$uname;max-age = 7200'</script>";
            echo("<script>window.location = 'increment.php?e=$en';</script>");
            exit();
        }
        else
        {
            echo "<script>alert('error logging in');</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - MIT Attendance</title>
  <link rel="stylesheet" href="loginstyle.css">
   <!-- Font Awesome Cdn Link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  
</head>
<body>
  <div class="wrapper">
    <h1>MIT Attendance</h1>
    <p>Welcome back</p>
    <form method="post" action="login.php?e=<?php echo $en ?>">
      <input name="uname" type="text" placeholder="Enter username">
      <input name="upass" type="password" placeholder="Password">
      <input type="submit" name="sub" value="Log in">
    </form>
    <div class="not-member">
    </div>
  </div>
</body>
</html>