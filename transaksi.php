<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $orderDate = $_POST["orderDate"];
    $selectedProduct = $_POST["selectedProduct"];
   

    // Insert data into the database (replace with your database logic)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "furnitureweb";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Escape special characters to prevent SQL injection
    $name = mysqli_real_escape_string($conn, $name);
    $phone = mysqli_real_escape_string($conn, $phone);
    $address = mysqli_real_escape_string($conn, $address);
    $orderDate = mysqli_real_escape_string($conn, $orderDate);
    $selectedProduct = mysqli_real_escape_string($conn, $selectedProduct);
    


    // Insert data into the table
    $sql = "INSERT INTO orders (name, phone, address, orderDate, selectedProduct) VALUES ('$name', '$phone', '$address', '$orderDate', '$selectedProduct')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to a thank you page or any other relevant page
        header("Location: http://localhost/phpmyadmin/index.php?route=/sql&pos=0&db=furnitureweb&table=orders");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
