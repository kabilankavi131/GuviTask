<?php
$mysqli = new mysqli("sql6.freesqldatabase.com", "sql6692789", "rLfgKUMcbs", "sql6692789");

// Check connection
if ($mysqli->connect_error) {
    die ("Connection failed: " . $mysqli->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

try {
    $query = "SELECT * FROM users WHERE email = ? AND password = ?";

    // Prepare the query
    $statement = $mysqli->prepare($query);

    // Bind parameters
    $statement->bind_param("ss", $email, $password);

    // Execute the query
    $statement->execute();

    // Get the result
    $result = $statement->get_result();

    // Check if there is a match
    if ($result->num_rows == 1) {
        // Login successful
        echo "success";
    } else {
        // Login failed
        echo "Invalid email or password";
    }
} catch (mysqli_sql_exception $e) {
    // Handle any SQL exception
    echo "An error occurred while processing your request";
}
?>