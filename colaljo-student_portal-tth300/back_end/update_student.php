<?php

include "db.php";

$data = json_decode(file_get_contents("php://input"), true);

$id = $data["id"];
$student_id = $data["student_id"];
$name = $data["name"];
$email = $data["email"];
$course = $data["course"];

$sql = "UPDATE students
        SET student_id = ?, name = ?, email = ?, course = ?
        WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $student_id, $name, $email, $course, $id);

header("Content-Type: application/json");

if ($stmt->execute()) {
    echo json_encode([
        "success" => true,
        "message" => "Student updated successfully"
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Failed to update student"
    ]);
}

$stmt->close();
$conn->close();

?>