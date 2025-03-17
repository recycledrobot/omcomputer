<?php
require_once 'db.php';

// Sanitize and get form data
$organisation = $_POST['organisation'] ?? "";
$phone = $_POST['phone'] ?? "";
$email = $_POST['email'] ?? "";
$document = $_POST['document'] ?? "";
$document_number = $_POST['document_number'] ?? ""; // Assuming 'document_number' is the name for PAN/VAT number

$uploadDir = "../uploads/";
$fileSaved = null;

// Handle file upload
if (!empty($_FILES['file_upload']['name'])) {
    $fileName = basename($_FILES['file_upload']['name']);
    $fileTmpName = $_FILES['file_upload']['tmp_name'];
    $filePath = $uploadDir . $fileName;

    if (move_uploaded_file($fileTmpName, $filePath)) {
        $fileSaved = $filePath;
    }
}

// Check if the organisation already exists in the database
$check_sql = "SELECT id FROM organisations WHERE organisation = :organisation";
$check_stmt = $pdo->prepare($check_sql);
$check_stmt->bindParam(':organisation', $organisation);
$check_stmt->execute();

if ($check_stmt->rowCount() > 0) {
    // organisation exists, update the existing record
    $id = $check_stmt->fetchColumn();
    $update_sql = "UPDATE organisations SET phone = :phone, email = :email, document = :document, document_number = :document_number, file_path = :file_path WHERE id = :id";
    $update_stmt = $pdo->prepare($update_sql);
    $update_params = [
        ':id' => $id,
        ':phone' => $phone,
        ':email' => $email,
        ':document' => $document,
        ':document_number' => $document_number,
        ':file_path' => $fileSaved
    ];

    if ($update_stmt->execute($update_params)) {
        echo json_encode(["status" => "success", "message" => "Data updated successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to update data"]);
    }
} else {
    // Insert new data into MySQL using PDO if organisation does not exist
    $insert_sql = "INSERT INTO organisations (organisation, phone, email, document, document_number, file_path) VALUES (:organisation, :phone, :email, :document, :document_number, :file_path)";
    $insert_stmt = $pdo->prepare($insert_sql);
    $insert_params = [
        ':organisation' => $organisation,
        ':phone' => $phone,
        ':email' => $email,
        ':document' => $document,
        ':document_number' => $document_number,
        ':file_path' => $fileSaved
    ];

    if ($insert_stmt->execute($insert_params)) {
        echo json_encode(["status" => "success", "message" => "Data saved successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to save data"]);
    }
}
?>
