<?php
require "predis/autoload.php";
Predis\Autoloader::register();
$mysqli = new mysqli("localhost", "root", "", "guvi");

// Check connection
if ($mysqli->connect_error) {
    die ("Connection failed: " . $mysqli->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];
//  Redis 
$redis = new Predis\Client([
    'scheme' => 'tcp',
    'host' => 'redis-16299.c281.us-east-1-2.ec2.cloud.redislabs.com',
    'port' => 16299,
    'password' => 'cedHk6jeKkb0vsbdugzOrKmbNnhgBx0G',
]);
$hashKey = "guvi:" . $username;
$hashData = $redis->hgetall($hashKey);

// Check if the hash exists and fetch its data
$flag = 0;
if (!empty ($hashData)) {

    if ($password == $hashData["password"])
        $flag = 1;
} else {
    $flag = 0;
}

try {

    // Check if there is a match
    if ($flag) {
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