<?php
$email = $_POST["email"];
$conn = mysqli_connect('localhost', 'root', '', 'email_addresses');
$stmt = $conn->prepare("INSERT INTO `email_addresses`(`email`) VALUES (?)");
if ($stmt === false) {
    echo "Failed to prepare statement: " . $conn->error;
    die();
}
$stmt->bind_param("s", $email);
$execval = $stmt->execute();
$stmt->close();
$conn->close();
if ($execval === false) {
    echo "Failed to execute statement: " . $stmt->error;
    die();
}
echo "Registration successfully...";
header("Location: Index.html", 302);
?>
