<?php  // PHP code--------------------------------------------------------

if(isset($_POST['Showtable']))  
{
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "register";

  $conn = mysqli_connect($servername, $username, $password, $dbname); //database connection

  if ($conn->connect_error) 
  {
    die("Connection failed: " . $conn->connect_error);
  }

  //Output Form Entries from the Database
      $sql = "SELECT Name, Email, PhoneNum, Gender, Age FROM form";

  //placeing query
      $result = mysqli_query($conn, $sql);
      if(mysqli_num_rows($result) > 0)
          {
             echo '<table> <tr> <th> Name </th> <th> Email </th> <th> PhoneNumber </th> <th> Gender </th> <th> Age </th> </tr>';
             while($row = mysqli_fetch_assoc($result))
             {
               // to output mysql data in HTML table format
                 echo '<tr > <td>' . $row["Name"] . '</td>
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

          // closing connection
              mysqli_close($conn);
}


if(isset($_POST['Inputres']))  
{

if (!empty($_POST)) 
{

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

$conn = mysqli_connect($servername, $username, $password, $dbname); //database connection

if ($conn->connect_error) 
{
  die("Connection failed: " . $conn->connect_error);
}

//collecting data
$Name = $_POST['Name'];
$Email = $_POST['Email'];
$PhoneNum = $_POST['PhoneNum'];
$Gender = $_POST['Gender'];
$Age = $_POST['Age'];

$sql = "INSERT INTO form (Name, Email, PhoneNum, Gender, Age) VALUES ('$Name','$Email','$PhoneNum', '$Gender' ,'$Age')";

if ($conn->query($sql) === TRUE) 
{
  echo "Record created successfully";
} 
else 
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}

}

?>



<!DOCTYPE HTML>  
<html lang="en">  <!-- HTML code-------------------------------------------------------->

 <head>
 	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title>Form</title>
  <link rel="stylesheet" href="style.css">
 </head>

<body>

  <h1>Registeration Form</h1>

<form action="index.php" method="post">
	Name: <input type="text" name="Name"><br><br>
  Email: <input type="text" name="Email"><br><br>
	Phone Number: <input type="text" name="PhoneNum" maxlength="10"><br><br>
  Gender: <input type="radio" id="male" name="Gender" value="Male"> <label for="male">Male</label>
          <input type="radio" id="female" name="Gender" value="Female"> <label for="female">Female</label> <br><br>
  Age: <input type="text" name="Age" maxlength="2"><br><br><br>
	<input type="submit" name="Inputres" value="Submit">
  <input type="submit" name="Showtable" value="Show Table">
  <input type="reset">
</form>

</body>

</html>