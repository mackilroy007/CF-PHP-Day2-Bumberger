<?php
if (isset($POST['submit'])) {
    if ($_POST['firstname'] && $_POST['lastname'] && $_POST['age'] && $_POST['email']) {
        echo "Your insert was processed.";
    } else {
        echo "Insert was not processed, you are missiing one or more entries.";
    }
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "danielandstephanontour";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
$age = mysqli_real_escape_string($conn, $_POST['age']);
$email = mysqli_real_escape_string($conn, $_POST['email']);

if (!$conn) {
    echo "There was an Error with in establishing a connection!";
}

$sql = "Insert into user (firstname, lastname, age, email) values ('$firstname', '$lastname', '$age', '$email')";
if (mysqli_query($conn, $sql)) {
    echo "Entry was created! GOOD JOB MOFO!";
} else {
    echo "Something went terribly wrong! " . mysqli_error($conn);
}
mysqli_close($conn);
?>