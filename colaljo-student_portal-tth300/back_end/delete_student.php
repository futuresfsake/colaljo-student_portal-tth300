<?php

include "db.php";

$data = json_decode(file_get_contents("php://input"), true);

$id = $data["id"];

$sql = "DELETE FROM students WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

header("Content-Type: application/json");

if ($stmt->execute()) {
    echo json_encode([
        "success" => true,
        "message" => "Student deleted successfully"
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Failed to delete student"
    ]);
}

$stmt->close();
$conn->close();

?>