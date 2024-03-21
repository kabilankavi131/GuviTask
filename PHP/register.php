<?php
require_once __DIR__ . '/vendor/autoload.php';
// Establish MySQLi connection
$mysqli = new mysqli("sql6.freesqldatabase.com", "sql6692789", "rLfgKUMcbs", "sql6692789");


// Check connection
if ($mysqli->connect_error) {
    die ("Connection failed: " . $mysqli->connect_error);
}

// Get input data from POST request
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];




$uri = 'mongodb+srv://kabilankavi131:kabilankavi131mgdb@guvi.0vulpya.mongodb.net/?retryWrites=true&w=majority&appName=guvi';
$client = new MongoDB\Client($uri);
$db = $client->selectDatabase('usersdata');
$collection = $db->selectCollection('profiledata');
$data = [
    'name' => $username,
    'email' => $email,
];
$result = $collection->insertOne($data);


if ($username != "" && $email != "" && $password != "") {
    try {
        // Your SQL query to insert data into the database
        $query = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";

        // Prepare the query
        $statement = $mysqli->prepare($query);

        // Bind parameters
        $statement->bind_param("sss", $username, $email, $password);

        // Execute the query
        $statement->execute();

        // Check if the query was successful
        if ($statement->affected_rows > 0) {
            echo "Registration successful";
        } else {
            echo "Registration failed";
        }
        // Close statement
        $statement->close();

        // Close connection
        $mysqli->close();
    } catch (mysqli_sql_exception $e) {
        // Check if the error message indicates a duplicate entry error
        if (strpos($e->getMessage(), "Duplicate entry") !== false) {
            echo "Username or email already exists"; // Return a specific error message for duplicate entry
        } else {
            echo "An error occurred while processing your request";
        }
    }
} else {
    echo "Enter All the details";
}
?>