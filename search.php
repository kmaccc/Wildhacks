<!DOCTYPE html>
<html>
<body>

<?php
$servername = "k4id1f74fu.database.windows.net";
$username = "abc";
$password = "G0c@tsg0";
$dbname = "Info";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$gen = '%' . $_POST["general"] . '%';
$book_name = '%' . $_POST["title"] . '%';
$isbn = '%' . $_POST["isbn"] . '%';
$class_name = '%' . $_POST["class"] . '%';

$sql = "SELECT * FROM Book_Information 
        WHERE (Book_name LIKE $book_name OR Book_name LIKE $gen) 
        AND ((ISBN LIKE $isbn OR ISBN LIKE $gen) 
        AND (Class_code LIKE $class_name OR Class_code LIKE $gen));";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Seller ID: " . $row["Seller_ID"] . " - Class: " . $row["Class_code"] . " - Book: " . 
        $row["Book_name"] . " - ISBN: " . $row["ISBN"] . " - State: " . $row["State"] . " - Location: " . 
        $row["Location"] . " - Price: " . $row["Price"] . " - Negotiable: " . $row["Negotiate"] . "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>

</body>
</html>