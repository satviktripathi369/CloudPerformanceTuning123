<?php
$email = $_POST["email"];

// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'email_addresses');

// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO `email_addresses`(`email`) VALUES (?)");

// Check if the statement was prepared successfully
if ($stmt === false) {
    echo "Failed to prepare statement: " . $conn->error;
    die();
}

// Bind the email address to the SQL statement
$stmt->bind_param("s", $email);

// Execute the SQL statement
$execval = $stmt->execute();

// Close the statement and database connection
$stmt->close();
$conn->close();

// Check if the SQL statement executed successfully
if ($execval === false) {
    echo "Failed to execute statement: " . $stmt->error;
    die();
}

// Echo a success message
echo "Registration successfully...";
header("Location: Index.html", 302);
?>
