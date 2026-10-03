<?php

include "db.php";

$id = $_GET["id"];

$sql = "SELECT * FROM students WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$student = $result->fetch_assoc();

header("Content-Type: application/json");
echo json_encode($student);

$stmt->close();
$conn->close();

?>