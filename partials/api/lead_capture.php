<?php
require_once __DIR__ . '/../includes/security.php';
header('Content-Type: application/json; charset=utf-8');
$body = json_decode(file_get_contents('php://input'), true);
if (!$body || empty($body['email']) || empty($body['phone'])) { http_response_code(400); echo json_encode(['ok'=>false]); exit; }

if ($mysqli && $mysqli->connect_errno===0) {
  $mysqli->query("CREATE TABLE IF NOT EXISTS leads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(80), last_name VARCHAR(80),
    phone VARCHAR(40), email VARCHAR(160),
    from_city VARCHAR(80), from_state VARCHAR(80),
    to_city VARCHAR(80), to_state VARCHAR(80),
    service_type VARCHAR(80), move_date DATE,
    status VARCHAR(40) DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");
  $stmt = $mysqli->prepare("INSERT INTO leads(first_name,last_name,phone,email,from_city,from_state,to_city,to_state,service_type,move_date) VALUES(?,?,?,?,?,?,?,?,?,?)");
  $stmt->bind_param('ssssssssss',
    $body['firstName'],$body['lastName'],$body['phone'],$body['email'],
    $body['fromCity'],$body['fromState'],$body['toCity'],$body['toState'],
    $body['serviceType'],$body['date']);
  $stmt->execute();
}

echo json_encode(['ok'=>true]);
