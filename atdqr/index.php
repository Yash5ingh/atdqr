<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>MIT ATTENDANCE</title>
  <link rel="stylesheet" href="style.css" />
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>
  <div class="container">
    <section class="main">
      <div class="main-top">
        <h1>MIT-Attendance</h1>
        <i class="fas fa-user-cog"></i>
      </div>
      <section class="attendance">
        <div class="attendance-list">
          <h1>Attendance List Section I</h1>
          <table class="table">
            <thead>
              <tr>
                <th>Roll Number</th>
                <th>Name</th>
                <th>Attendance Count</th>
                
                <?php
include_once 'conn.php';

$sql1 = "SELECT * FROM lectures;";
$result1 = mysqli_query($conn, $sql1);
$checkresult1 = mysqli_num_rows($result1);

if($checkresult1 > 0)
{
    while($row1 = mysqli_fetch_assoc($result1))
    {
        $d = $row1['dates'];

        echo "<th>$d</th>"; 
    };
}
?>
              </tr>
            </thead>
            <tbody>

<?php
include_once 'conn.php';

$sql = "SELECT * FROM students;";
$result = mysqli_query($conn, $sql);
$checkresult = mysqli_num_rows($result);

if($checkresult > 0)
{
 
    while($row = mysqli_fetch_assoc($result))
    {
        $e = $row['enroll'] ;
        $n = $row['sname'] ;
        $a =  $row['attcoun'];

        echo "<tr bgcolor='lightgrey'>
                <td>$e</td>
                <td>$n</td>
                <td>$a</td>";
                
                $sql1 = "SELECT * FROM lectures;";
                $result1 = mysqli_query($conn, $sql1);
                $checkresult1 = mysqli_num_rows($result1);
                
                if($checkresult1 > 0)
                {
                    while($row1 = mysqli_fetch_assoc($result1))
                    {
                        $d = $row1['dates'];
                        $sd = $row[$d];
                        echo "<td>$sd</td>"; 
                    };
                }

            echo "</tr>"; 
    };
}
?>
            </tbody>
          </table>
        </div>
      </section>
    </section>
  </div>

</body>
</html>





















