<?php
require "predis/autoload.php";
Predis\Autoloader::register();

try {
    // Replace 'your_remote_redis_host' and 'your_remote_redis_port' with the actual hostname and port of your remote Redis server.
    $redis = new Predis\Client([
        'scheme' => 'tcp',
        'host' => 'redis-16299.c281.us-east-1-2.ec2.cloud.redislabs.com',
        'port' => 16299,
        'password' => 'cedHk6jeKkb0vsbdugzOrKmbNnhgBx0G',
    ]);

    $redis->set("hello_world", "Hi from PHP!");
    $redis->hmset("notes:my_hash_key", [
        "field1" => "value1",
        "field2" => "value2",
        "field3" => "value3",
    ]);
    $value = $redis->get("hello_world");
    var_dump($value);
} catch (Exception $e) {
    echo "Couldn't connect to Redis: " . $e->getMessage();
}
?>