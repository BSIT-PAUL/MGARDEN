<?php
include_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $fullname = $_POST['fullname'];
    // Check if username or phone number already exists
    $sql_check = "SELECT * FROM users WHERE username = :username OR phone = :phone";
    $stmt_check = $db->prepare($sql_check);
    $stmt_check->bindParam(':username', $username);
    $stmt_check->bindParam(':phone', $phone);
    $stmt_check->execute();

    if ($stmt_check->rowCount() > 0) {
        header('Location: ../register.php?type=error&message=' . urlencode($username . ' or ' . $phone . ' already exists'));
        exit();
    }

    // Insert new user
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql_insert_user = "INSERT INTO users (username, password, address, phone, type) VALUES (:username, :password, :address, :phone, 'customer')";
    $stmt_insert_user = $db->prepare($sql_insert_user);
    $stmt_insert_user->bindParam(':username', $username);
    $stmt_insert_user->bindParam(':password', $hashed_password);
    $stmt_insert_user->bindParam(':address', $address);
    $stmt_insert_user->bindParam(':phone', $phone);
    $stmt_insert_user->execute();

    // Insert into customers table
   
    $sql_insert_customer = "INSERT INTO customers (fullname, address, phone) VALUES (:fullname, :address, :phone)";
    $stmt_insert_customer = $db->prepare($sql_insert_customer);
    $stmt_insert_customer->bindParam(':fullname', $fullname);
    $stmt_insert_customer->bindParam(':address', $address);
    $stmt_insert_customer->bindParam(':phone', $phone);
    $stmt_insert_customer->execute();

    // Log the registration
    generate_logs('Register user', $fullname . '| New user was added');

    header('Location: ../login.php?type=success&message=Registration successful');
    exit();
} else {
    header('Location: ../register.php'); // Redirect if accessed directly without POST data
    exit();
}
?>
