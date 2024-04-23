<?php
include_once 'connection.php';

try {
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

  
    // Update the customer information
    $sqlUpdate = "UPDATE customers SET fullname = :fullname, address = :address, phone = :phone WHERE id = :id";
    $statement = $db->prepare($sqlUpdate);
    $statement->bindParam(':id', $id);
    $statement->bindParam(':fullname', $fullname);
    $statement->bindParam(':address', $address);
    $statement->bindParam(':phone', $phone);
    $statement->execute();

    generate_logs('Customer Update', $fullname . '| Info was updated');
    header('Location: ../customer.php?type=success&message=Customer Info was updated successfully!');
    exit();

} catch (\Throwable $th) {
    generate_logs('Customer Update', $fullname . '| Error: ' . $th->getMessage());
    header('Location: ../customer.php?type=error&message=An error occurred while updating customer information.');
    exit();
}
?>
