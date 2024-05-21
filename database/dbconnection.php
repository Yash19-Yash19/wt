<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "INSERT INTO info (Name, Address, Email, Phone) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);


$stmt->bind_param("ssss", $name, $address, $email, $phone);


$name = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['phone'];

if ($stmt->execute()) {
    echo "New record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>
