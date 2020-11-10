<!DOCTYPE html>
<html>
<head>
       <title>PHP form example: POST</title>
</head>
<body >
<form action="test.php" method ="POST">
Name: <input type="text"  name="name" />
Age: <input type ="text" name="age" />
<input  type="submit" name="submit"  />
</form>
<?php
if( isset($_POST['submit']))
{
if( $_POST["name" ] || $_POST["age"] )
{
echo "Welcome ". $_POST[ 'name']. "<br />";
echo "You are " . $_POST['age']. " years old.";
}
else{
    echo "There seems to be an error.";
}
}


$servername = "localhost";
$username = "root";
$password = "" ;
$dbname = "test";
// Create connection
//link forms content with the database
$conn = mysqli_connect($servername, $username, $password, $dbname);
$name = mysqli_real_escape_string($conn, $_POST['name']);
$age = mysqli_real_escape_string($conn, $_POST['age']);
// Check connection
if (!$conn) {
   die("Connection failed: "  . mysqli_connect_error() . "\n");
}

$sql = "INSERT INTO user (name, age)
VALUES ('$name', '$age')";
if (mysqli_query($conn, $sql)) {
    echo "New record created.\n";
} else {
   echo  "Record creation error for: " . $sql . "\n" . mysqli_error($conn);
}
mysqli_close($conn);
?>
</ body>
</html>