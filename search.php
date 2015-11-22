<!DOCTYPE html>
<html>
<body>

<?php
if (is_ajax()) {
    search_connection();
}

//Function to check if the request is an AJAX request
function is_ajax() {
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

function search_connection() {
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
    
    $return = $_POST;
    
    $gen = '%' . $return["general"] . '%';
    $book_name = '%' . $return["title"] . '%';
    $isbn = '%' . $return["isbn"] . '%';
    $class_name = '%' . $return["class"] . '%';
    
    $sql = "SELECT * FROM Book_Information 
            WHERE (Book_name LIKE $book_name OR Book_name LIKE $gen) 
            AND ((ISBN LIKE $isbn OR ISBN LIKE $gen) 
            AND (Class_code LIKE $class_name OR Class_code LIKE $gen));";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $return["Book_name"] = $row["Book_name"];
            $return["Class_code"] = $row["Class_code"]; 
            $return["ISBN"] = $row["ISBN"];
            $return["Seller_ID"] = $row["Seller_ID"];
            $return["State"] = $row["State"]; 
            $return["Price"] = $row["Price"];
            $return["Location"] = $row["Location"]
            $return["Negotiate"] = $row["Negotiate"];
            $return["json"] = json_encode($return);
            echo json_encode($return);
            
            /*echo $row["Book_name"] . "\n" . $row["Class_code"] . "\n" . 
            $row["ISBN"] . "\n" . $row["Seller_ID"] . "\n" . $row["State"] . "\n" . 
            $row["Price"] . "\n" . $row["Location"] . "\n" . $row["Negotiate"] . "<br>";*/
            /*echo "Seller ID: " . $row["Seller_ID"] . " - Class: " . $row["Class_code"] . " - Book: " . 
            $row["Book_name"] . " - ISBN: " . $row["ISBN"] . " - State: " . $row["State"] . " - Location: " . 
            $row["Location"] . " - Price: " . $row["Price"] . " - Negotiable: " . $row["Negotiate"] . "<br>";*/
        }
    } else {
        echo "0 results";
    }
    $conn->close();
}
?>

</body>
</html>