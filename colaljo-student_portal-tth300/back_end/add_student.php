<?php

include "db.php";

$data = json_decode(file_get_contents("php://input"), true);

$student_id = $data["student_id"];
$name = $data["name"];
$email = $data["email"];
$course = $data["course"];

$sql = "INSERT INTO students (student_id, name, email, course)
        VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $student_id, $name, $email, $course);

header("Content-Type: application/json");

if ($stmt->execute()) {
    echo json_encode([
        "success" => true,
        "message" => "Student added successfully"
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Failed to add student"
    ]);
}

$stmt->close();
$conn->close();

?>