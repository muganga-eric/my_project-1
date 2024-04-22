<?php
include("connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $image = $_POST['image'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare SQL statement
    $sql = "INSERT INTO users (image, username, email, password) VALUES (, , , )";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $image, $username, $email, $password);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
