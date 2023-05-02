<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vera";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "CREATE TABLE subscribers (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(50) NOT NULL
)";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];

  $sql = "INSERT INTO subscriptions (email) VALUES ('$email')";

  if ($conn->query($sql) === TRUE) {
    echo "Thank you for subscribing! \n";
    echo "redirecting to home in 5 seconds.....";
    header("Refresh: 5; URL=index.php");
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
$conn->close();
?>