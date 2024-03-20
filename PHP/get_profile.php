<?php
// Include your database connection code here

// Assuming you have already started the session and stored the user ID in $_SESSION['user_id']

$conn = new mysqli("localhost", "root", "", "guvi");
$user_id = $_SESSION['email'];

// Fetch user profile data from the database
// Modify this query according to your database schema
$query = "SELECT * FROM users WHERE id = $user_id";

// Execute the query and fetch the user data
// Execute the query and fetch the user data
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Convert the fetched data to JSON format
    $profile_data = json_encode($row);
    echo $profile_data;
} else {
    echo "Error: User profile not found";
}
?>