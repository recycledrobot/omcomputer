<?php
require_once 'db.php';

// Sanitize and get form data
$organization = $_POST['organization'] ?? "";
$phone = $_POST['phone'] ?? "";
$email = $_POST['email'] ?? "";
$document = $_POST['document'] ?? "";

// Handle file upload
$uploadDir = "../uploads/";
$fileSaved = null;

if (!empty($_FILES['file_upload']['name'])) {
    $fileName = basename($_FILES['file_upload']['name']);
    $fileTmpName = $_FILES['file_upload']['tmp_name'];
    $filePath = $uploadDir . $fileName;

    if (move_uploaded_file($fileTmpName, $filePath)) {
        $fileSaved = $filePath;
    }
}

// Insert data into MySQL using PDO
$sql = "INSERT INTO organizations (organization, phone, email, document, file_path) VALUES (:organization, :phone, :email, :document, :file_path)";
$stmt = $pdo->prepare($sql);
$params = [
    ':organization' => $organization,
    ':phone' => $phone,
    ':email' => $email,
    ':document' => $document,
    ':file_path' => $fileSaved
];

if ($stmt->execute($params)) {
    echo json_encode(["status" => "success", "message" => "Data saved successfully"]);
} else {
    echo json_encode(["status" => "error", "message" => "Failed to save data"]);
}
?>
