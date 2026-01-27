<?php
header("Content-Type: application/json");
include "connection.php";

$method = $_SERVER["REQUEST_METHOD"];

if ($method == "GET") {
    $result = $conn->query("SELECT * FROM students");
    $students = [];

    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }

    echo json_encode($students);
    exit;
}

if ($method == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    $name = $data["name"];
    $email = $data["email"];
    $age = $data["age"];

    $conn->query("INSERT INTO students (name,email,age) VALUES ('$name','$email','$age')");

    echo json_encode(["message" => "Student Added"]);
    exit;
}

if ($method == "PUT") {
    $data = json_decode(file_get_contents("php://input"), true);

    $id = $data["id"];
    $name = $data["name"];
    $email = $data["email"];
    $age = $data["age"];

    $conn->query("UPDATE students SET name='$name', email='$email', age='$age' WHERE id=$id");

    echo json_encode(["message" => "Student Updated"]);
    exit;
}

if ($method == "DELETE") {
    $data = json_decode(file_get_contents("php://input"), true);

    $id = $data["id"];

    $conn->query("DELETE FROM students WHERE id=$id");

    echo json_encode(["message" => "Student Deleted"]);
    exit;
}
?>

