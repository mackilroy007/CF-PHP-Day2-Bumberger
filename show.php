<?php
if (isset($POST['submit2'])) {
echo "Database show commence!";
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "danielandstephanontour";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    echo "There was an Error with in establishing a connection!";
}

$sql = "Select * from user";
$result = $conn->query($sql);
if ($result->num_rows>0) {
    while($row = $result->fetch_assoc()){
        echo "first name: ". $row["firstname"] . "<br>last name: ". $row["lastname"] . "<br>Age: ". $row["age"] . "<br>Email: ". $row["email"] . "<br>";
    }
} else {
    echo "fuck all" . mysqli_error($conn);
}
mysqli_close($conn);
?>