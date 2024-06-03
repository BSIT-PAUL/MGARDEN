<?php
include_once 'connection.php';

$username = $_POST['username'];
$password = $_POST['password'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$address = $_POST['address'];
$phone = $_POST['phone'];

$sql = "SELECT * FROM users WHERE username = :username OR phone = :phone";
$stmt = $db->prepare($sql);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':phone', $phone);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    header('Location: ../users.php?type=error&message='.$username.' or '.$phone.' is already exist');
    exit();
}

$sql = "INSERT INTO users (`username`, `password`, `address`, `phone`, `type`) VALUES (:username, :password, :address, :phone, 'staff')";
$stmt = $db->prepare($sql);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password',$password);
$stmt->bindParam(':address', $address);
$stmt->bindParam(':phone', $phone);
$stmt->execute();

generate_logs('Adding user', $username.'| New user was added');
header('Location: ../users.php?type=success&message=New user was added successfully');
?>