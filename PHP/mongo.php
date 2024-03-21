<?php
require_once __DIR__ . '/vendor/autoload.php';
$uri = 'mongodb+srv://kabilankavi131:kabilankavi131mgdb@guvi.0vulpya.mongodb.net/?retryWrites=true&w=majority&appName=guvi';
$client = new MongoDB\Client($uri);
try {
    $collection = $client->usersdata->profiledata;
    $name = "<script>document.write(localStorage.getItem('username'));</script>";
    $criteria = ['name' => $name];
    $result = $collection->findOne($criteria);
    
    if ($result) {
        // Document found, extract data
        $data = [
            'name' => $result['name'],
            'age' => $result['email'],
        ];
        echo json_encode($data);
    }
} catch (Exception $e) {
    printf($e->getMessage());
}
?>