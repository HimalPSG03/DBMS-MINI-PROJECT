<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vera";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $product = $_POST["product"];

  $sql = "INSERT INTO joins (name, email, phone, product) VALUES ('$name', '$email', '$phone', '$product')";

  if ($conn->query($sql) === TRUE) {
    echo "Thank you for your joining " . $name . "\n";

    echo "redirect to the home page in 5 seconds.....";
    header("Refresh: 5; URL=index.php");
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
$conn->close();
?>
