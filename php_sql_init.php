<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<?php
$servername = "k4id1f74fu.database.windows.net";
$username = "abc";
$password = "G0c@tsg0";
$dbname = "Info";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn.connect_errno) {
    die("Connection failed: " . $conn.connect_error);
} 

$sql = "SELECT * FROM Book_Information";
$result = $conn.query($sql);

if ($result.num_rows > 0) {
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