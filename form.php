<?php
// Database connection
$host = 'localhost'; // or your database host
$dbname = 'form'; // your database name
$username = 'root'; // your database username
$password = ''; // your database password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set PDO to throw exceptions on error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Prepare SQL statement to insert data into the database
    $stmt = $pdo->prepare("INSERT INTO persional (name, email, message) VALUES (:name, :email, :message)");

    // Bind parameters and execute the statement
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':message', $message);

    try {
        $stmt->execute();
        echo "Data inserted successfully";
    } catch (PDOException $e) {
        echo "Insertion failed: " . $e->getMessage();
    }
}
?>

<!-- HTML form -->
<form method="post">
    Name: <input type="text" name="name"><br>
    Email: <input type="email" name="email"><br>
    Message: <textarea name="message"></textarea><br>
    <input type="submit" value="Submit">
</form>
