<?php
header('Content-Type: application/json');

// Database credentials
$host = '172.31.23.222';
$dbname = 'instacart';
$username = 'root';
$password = '';

// Connect to DB
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Database connection failed"]);
    exit;
}

// Get item from query string (e.g. ?item=Lettuce)
$item = isset($_GET['item']) ? $conn->real_escape_string($_GET['item']) : '';

// Run query
$sql = $item !== '' ?
    "SELECT * FROM quality_reports WHERE item LIKE '%$item%'" :
    "SELECT * FROM quality_reports";

$result = $conn->query($sql);

if (!$result) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Query failed"]);
    exit;
}

// Format and return JSON
$data = ["status" => "success", "items" => []];
while ($row = $result->fetch_assoc()) {
    $data["items"][] = $row;
}

echo json_encode($data);
$conn->close();
?>
