<?php
include("./backend/libraries/DBconn.php");


// Create a new database connection
$database = new Database();
$conn = $database->getConnection();


// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the entered username and password
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        // Prepare a SELECT query to check if the user exists
        $query = "SELECT * FROM users WHERE email = :email AND password = :password";
        $statement = $conn->prepare($query);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':password', $password);
        $statement->execute();

        // Check if the query returned any rows
        if ($statement->rowCount() > 0) {
            // User exists, redirect to the home page
            header("Location: home.php");
            exit;
        } else {
            // User does not exist, show a dialog box
            echo '<script>alert("Please register.");</script>';
            header('location: login.php');
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

