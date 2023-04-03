<?php  // PHP code--------------------------------------------------------

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

$conn = mysqli_connect($servername, $username, $password, $dbname); //database connection

if ($conn->connect_error) 
{
  die("Connection failed: " . $conn->connect_error);
}

//-----------------------------------------------------
//Output Form Entries from the Database

//Output Form Entries from the Database
    $sql = "SELECT Name, Email, PhoneNum, Gender, Age FROM form";

//placeing query
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0)
        {
           echo '<table> <tr> <th> Name </th> <th> Email </th> <th> PhoneNumber </th> <th> Gender </th> <th> Age </th> </tr>';
           while($row = mysqli_fetch_assoc($result)){
             // to output mysql data in HTML table format
               echo '<tr > <td>' . $row["id"] . '</td>
               <td>' . $row["Name"] . '</td>
               <td>' . $row["Email"] . '</td>
               <td>' . $row["PhoneNum"] . '</td>
               <td>' . $row["Gender"] . '</td>
               <td>' . $row["Age"] . '</td> </tr>';
           }
           echo '</table>';
        }
        else
        {
          echo "0 results";
        }


?>