<?php
try {
    // Create a MongoDB connection
    $manager = new MongoDB\Driver\Manager("mongodb+srv://kabilankavi131:kabilankavi131mgdb@azure-westus-1-fzl9p.azure.mongodb.net/test?retryWrites=true&w=majority");
    // Define the database and collection you want to query
    $database = "userdata";
    $collection = "profiledata";

    // Create a query object
    $query = new MongoDB\Driver\Query([]);

    // Execute the query
    $cursor = $manager->executeQuery("$database.$collection", $query);

    // Iterate through the results
    foreach ($cursor as $document) {
        // Access individual fields within the document
        $field1 = $document->name;
        $field2 = $document->age;
        $field3 = $document->address;
        // Access more fields as needed...

        // Now you can use these fields as per your requirements
        echo "Name: " . $field1 . "<br>";
        echo "Age: " . $field2 . "<br>";
        echo "Address: " . $field3 . "<br>";
        // Output more fields as needed...
    }
} catch (MongoDB\Driver\Exception\Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>